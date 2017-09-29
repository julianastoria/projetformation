<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Manager\UserManager;
use \W\Security\AuthentificationManager;

class UsersController extends Controller 
{

	private $authManager;
	private $userManager;


	public function __construct()
	{
		$this->authManager= new AuthentificationManager;

		$this->userManager= new UserManager;
		$this->userManager->setTable('users');
	}
	public function profile ()
	{
		//Verifie si l'existence de la session 
		if (empty($_SESSION))
		{
			//redirige vers la page login
			$this->redirectToRoute('user_signin');
		} 
		$UsersManager=new \Manager\UsersManager;
		$departement=$UsersManager->findDepartement($_SESSION['user']['id_departement']);
		$autism=$UsersManager->findAutism($_SESSION['user']['id_autism']);
		$this->show('user/profile',[
			'title'=>'Profile de '. $_SESSION['user']['firstname'],
			'user'=>$_SESSION['user'],
			'departement'=>$departement['name'],
			'autism'=>$autism['name']
			]);
	}
	public function signin ()
	{
		$email=null;
		$error=null;

		// Si la requete HTTP est POST
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			//Recupere les données du POST
 			$email=$_POST['email'];
 			$password=$_POST['password'];
			//Controller les identifications 
 			if ($id=$this->authManager->isValidLoginInfo($email, $password))
      		{		
				//récupere les données de l'identifiant dans la bdd
      			$user=$this->userManager->find($id);
				//Ajoute l'identifiant a la session 
      			$this->authManager->logUserIn($user);
				//redirige vers la page de profile
				$this->redirectToRoute('profile'); 
 			} 
 			else 
 			{
 				$error="L'email ou le mot de passe est incorrect";
 			}
 		}	
		$this->show('user/signin',[
				'title'=>'connexion',
				'email'=>$email,
				'error'=>$error,
			]);
	}
	public function signup ()
	{
		$email=null;
		$firstname=null;
		$lastname=null;
		$birth_day=null;
		$birth_month=null;
		$birth_year=null;
		$departement=null;
		$situation=null;
		$autism=null;
		$error=array();

		//Definir les differents autisme et departement avec la bdd
		$autismsManager=new \Manager\AutismsManager;
		$autisms=$autismsManager->findAll();
		$departementManager= new \Manager\DepartementsManager;
		$departements=$departementManager->findAll();

		//Si la requete HTTP est POST
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
 			$save = true;
 			//récuperer les données du post 
 			$email=strip_tags(trim($_POST['email']));
 			$password=strip_tags(trim($_POST['password']));
 			$repeat_password=strip_tags(trim($_POST['repeat_password']));
			$firstname=strip_tags(trim($_POST['firstname']));
			$lastname=strip_tags(trim($_POST['lastname']));
			$birth_day=strip_tags(trim($_POST['birth_day']));
			$birth_month=strip_tags(trim($_POST['birth_month']));
			$birth_year=strip_tags(trim($_POST['birth_year']));
			$situation=strip_tags(trim($_POST['situation']));

			$id_autism=strip_tags(trim($_POST['id_autism']));
			$id_departement=strip_tags(trim($_POST['id_departement']));

			//Controle des données 

			// ------ Email ------
			if (empty($email))
			{
				$save=false;
				$error['email']="le champ email est vide";
			}

			else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$save=false;
				$error['email']="l'email n'est pas valide";
			} 
			else if ($this->userManager->emailExists($email))
			{
				$save=false;
				$error['email']="l'email a déjà été utilisée";
			} 

			// ---- Mot de passe ------
			if (empty($password))
			{
				$save=false;
				$error['password']="le champ mot de passe est vide";
			}
			
			else if ($password!==$repeat_password)
			{
				$save=false;
				$error['password']="";
			}
			if (empty($firstname))
			{
				$save=false;
				$error['firstname']="le champ prenom est vide";
			}
			if (empty($lastname))
			{
				$save=false;
				$error['lastname']="le champ nom est vide";
			}
			if (empty($birth_day) )
			{
				$save=false;
				$error['birthday']="le champ date de naissance est vide";
			}
			
				
			if ($save)
			{
				//Haschage du password
				$password=password_hash($password,PASSWORD_DEFAULT);
				$user_data=[
						'firstname'=>$firstname,
						'lastname'=>$lastname,
						'email'=>$email,
						'password'=>$password,
						'birthday'=>$birthday,
						'id_departement'=>$id_departement,
						'roles'=>'user',
						'situations'=>$situation,
						'id_autism'=>$id_autism,
					];
				//introduction des données dans la BDD
				$user=$this->userManager->insert($user_data);
				//Ajouter l'utilisateur dans la session 
				$_SESSION['user']= array (
					'id'=>$user['id'],
					'email'=>$user['email'],
					'firstname'=>$user['firstname'],
					'lastname'=>$user['lastname'],
					'birthday'=>$user['birthday'],
					'id_departement'=>$user['id_departement'],
					'roles'=>$user['roles'],
					'situations'=>$user['situation'],
					'id_autism'=>$user['id_autism'],
				);
				//Rediriger vers la page de profile 
				$this->redirectToRoute('profile'); 				
			}
		}
		$this->show('user/signup',[
				'title'=>'Inscription',
				'email'=>$email,
				'firstname'=>$firstname,
				'lastname'=>$lastname,
				'situations'=>$situation,
				'autisms'=>$autisms,
				'departements'=>$departements,
				'errors'=>$error
			]);
	}
	public function lost_pwd ()
	{
		$email=null;
		$error=null;
		// Verifie si la requete HTTP est POST
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			//Recupere les données du post
			$email=strip_tags(trim($_POST['email']));
			//Verifie l'existence du mail dans la bdd 
			if ($user =$this->userManager->getUserByUsernameOrEmail($email))
			{
				//Generation du token 
				$token=array(
              		'token'=>md5(\W\Security\StringUtils::randomString(10)),
              		'timeout'=>time()+strtotime('+1 hour'),
              		'user_id'=>$user['id']
            	);
				//Generation de l'url
				$url=$this->generateUrl('reset_pwd',['token'=>$token['token']]);
			}
		}
		$this->show('user/lost_pwd',[
				'title'=>'Mot de passe perdu',
				'error'=>$error,
			]);
	}
	public function reset_pwd ($token)
	{
		$password=null;
		$repeat_password=null;
		$error=null;
		// Verifie si la requete HTTP est POST
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			
			//Recupere les données du post
			$password=$_POST['password'];
			$repeat_password=$_POST['repeat_password'];
			//Récupere le token 
			$tokensManager= new \Manager\UsersManager;
			$token_data=$tokensManager->findByToken($token);
			//Verifier les mdp 
			if ($password!==$repeat_password)
			{
				$save=false;
				$error='les mots de passe ne sont pas identiques';
				
			} else {
				//Verifie la validite du token 
				if (time()<$token['timeout'])
				{

					//Haschage du nouveau mdp
					$password=password_hash($password,PASSWORD_DEFAULT);
					//changer l'ancien mdp par le nouveau 
					$this->userManager->update(['password'=>$password],$user['id']);
					//redirige vers la page de connexion
					$this->redirectToRoute('user_signin');
				} 
				else 
				{
					$error="la session a expiré";
				}
			}		
		}
		$this->show('user/reset_pwd',[
			'title'=>'reinitialisation mot de passe',
			'error'=>$error
			]);
	}
	public function logout ()
	{
		//Detruire la session 
		$this->authManager->logUserOut();
		//Redirige vers la page d'acceuil
		$this->redirectToRoute('home');
	}
}