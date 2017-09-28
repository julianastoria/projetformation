<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\InstitutionsManager;
use \Manager\InstitutionCategoryManager;
use \Manager\DepartementsManager;


class InstitutionsController extends Controller
{

	public function __construct () 
	{
		 $this->InstitutionsManager= new InstitutionsManager;
		 $this->InstitutionCategoryManager= new InstitutionCategoryManager;
		 $this->InstitutionCategoryManager->setTable('institution_categories');

		 $this->DepartementsManager=new DepartementsManager;

	}

	public function index()
	{
		if (empty($_GET['page']))
		{
			$page=1;
		}
		else
		{
			$page=intval($_GET['page']);
		}
		$limit=1;
		$offset=($page-1)*$limit;
		$institutions = $this->InstitutionsManager->findAll('id','ASC',$limit,$offset);
		$institutions_dp = $this->InstitutionsManager->findAllWithDepartement();
		$institutions_cat = $this->InstitutionsManager->findAllWithCategory();

		for ($i = 0; $i < count($institutions); $i++) { 
			$institutions[$i]['name_departement'] = $institutions_dp[$i]['name'];
			$institutions[$i]['name_institution_category'] = $institutions_cat[$i]['name'];
			
		}

		// Definir la page max 
		//--- Récuperer le nombre d'etablissement
		$nbresinstitutions=count($this->InstitutionsManager->findAll());
		//--- Calcule le nombre de page max 
		$pagemax= $nbresinstitutions/$limit;
		//Appeller la vue index 
		$this->show('institutions/index', [
			'institutions' => $institutions,
			'title'=>'Liste des etablissement',
			'page'=>$page,
			'page_max'=>$pagemax
		]);
	}

	public function read($id)
	{
		//Definir toutes les valeur en null par défault
		$main_notes=null;
		$sub_notes1=null;
		$sub_notes2=null;
		$sub_notes3=null;
		$title_comment=null;
		$comment=null;
		$user=null;
		$id_user=null;

		//Récuperer la categorie et le nom du département de l'établissement 
		//--- Recuperer les données de l'etablissement 
		$institution = $this->InstitutionsManager->find($id);
		//--- Utiliser les méthodes du InstitutionsManager
		$institution_dp = $this->InstitutionsManager->findWithDepartement($institution['id_departement']);
		$institution_cat = $this->InstitutionsManager->findWithCategory($institution['id_institution_category']); 
		$institution['name_departement'] = $institution_dp['name'];
		$institution['name_institution_category'] = $institution_cat['name'];

		//Creer une adresse au format JSON 
		$adresse_json=json_encode($institution['address']);

		//Recuperer les critéres des sous notes 
		//--- Recuperer le type de l'etalissement avec l'id
		$type_institution=$this->InstitutionsManager->find($id)['type_institution'];
		//--- definir les critere des sous notes en fonction du type trouvé
		$title_sub_notes1="Acceuil";
		if ($type_institution === 'École')
		{
			
			$title_sub_notes2='Inclusion sociale';
			$title_sub_notes3='Adaptation envers l’autisme';
		} 
		else if ($type_institution === 'Établissement spécialisé')
		{
			$title_sub_notes2='Prise en charge';
			$title_sub_notes3='Inspire confiance';
		}
		if (!isset($institution['name_departement']))
		{
			$error="l'etablissement n'existe pas ou a ete supprimée";
			$title=null;
		} else {
			$title='Les détails du '.$institution['name'];
			$error=null;
		}

		//Récupere les notes 
		$InstitutionNotesManager=new \Manager\InstitutionNotesManager;
		$notes=$InstitutionNotesManager->findByInstitution($institution['id']);
		for ($i=0;$i<count($notes);$i++)
		{
			//Recuperer l'utilisateur par l'id de la note 
			//--- Recuperer l'id de l'utilisateur 
			$id_user[$i]=$notes[$i]['id_user'];
			//--- Instancier le UserManager 
			$userManager=new \W\Manager\userManager;
			$userManager->setTable('users');
			//--- Chercher l'utilsateur avec l'id
			$user[$i]=$userManager->find($id_user[$i])['firstname'];
			//Recuperer les notes principales 
			$main_notes[$i]=$notes[$i]['main_note'];

			//Decomposer les sous notes 
			$sub_notes[$i]=$notes[$i]['sub_notes'];
			$sub_notes[$i]=explode(':', $sub_notes[$i]);
			$sub_notes1[$i]=$sub_notes[$i][0];
			$sub_notes2[$i]=$sub_notes[$i][1];
			$sub_notes3[$i]=$sub_notes[$i][2];
			
			//Recuperer le commentaire et le titre 
			$title_comment[$i]=$notes[$i]['title_comment'];
			$comment[$i]=$notes[$i]['comment'];

		}
		//Appeller la vue du read
		$this->show('institutions/read', [
			'institution' => $institution,
			'title'=>$title,
			'error'=>$error,
			'main_notes'=>$main_notes,
			'sub_notes1'=>$sub_notes1,
			'sub_notes2'=>$sub_notes2,
			'sub_notes3'=>$sub_notes3,
			'title_comment'=>$title_comment,
			'comment'=>$comment,
			'user'=>$user,
			'id_user'=>$id_user,
			'title_sub_notes1'=>$title_sub_notes1,			
			'title_sub_notes2'=>$title_sub_notes2,
			'title_sub_notes3'=>$title_sub_notes3,
			'adresse_json'=>$adresse_json

		]);
	}

	public function create()
	{

		// $this->allowTo(array('moderator','administrator'));
		//Définir tous les valeurs par défault
		$error=array();
		$name=null;
		$address=null;
		$postal_code=null;
		$city=null;
		$tel=null;
		$email=null;
		$site=null;
		$photos=null;
		$type_institution=null;
		//$departements=$this->DepartementsManager->findAll();
		$institution_categories=$this->InstitutionCategoryManager->findAll();
		// Verifier si la requete HTTP est post
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$save=true;
			//Récuperer les données du post
			$name=$_POST['name'];
			$address=$_POST['address'];
			$postal_code=$_POST['postal_code'];
			$city=$_POST['city'];
			$tel=$_POST['tel'];
			$email=$_POST['email'];
			$site=$_POST['site'];
			$photos=$_POST['photos'];
			$type_institution=$_POST['type_institution'];
			$id_institution_category=$_POST['id_institution_category'];

			//récuperer le departement via le code postal 
			$departement=substr($postal_code, 0, 2);

			$id_departement=$this->DepartementsManager->findByNumber($departement)['id'];
			//controle des données 
			if (empty($name))
			{
				$save=false;
				$error['name']="le champ nom ne pas etre vide";
			}
			if (empty($address) || empty($postal_code) || empty($city))
			{
				$save=false;
				$error['address']="les champs addresse , code postal , ville ne doivent pas etre vide";
			}
			if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$save=false;
				$error['email']="l'email est incorrecte";
			}
			if (empty($tel))
			{
				$save=false;
				$error['tel']="le champ telephone ne doit pas etre vide";
			}
			if (empty($type_institution))
			{
				$save=false;
				$error['type_institution']="le champ type d'etablissement ne doit pas etre vide";
			}
			if (empty($id_institution_category))
			{
				$save=false;
				$error['id_institution_category']="le champ categorie ne doit pas etre vide";
			}
			
			//controller la validite des données

			if ($save)
			{
				$address="$address $postal_code $city";
				//Enregistre le docteur dans la bdd
				$institution=$this->InstitutionsManager->insert([
					'name'=>$name,
					'address'=>$address,
					'email'=>$email,
					'site'=>$site,
					'tel'=>$tel,
					'id_departement'=>$id_departement,
					'photos'=>$photos,
					'type_institution'=>$type_institution,
					'id_institution_category'=>$id_institution_category,
					]);
				//Redirige vers la page de details de l'etablissement
				$this->redirectToRoute('institution_details',['id'=>$institution['id']]);
			}

		}
		//Appeller la vue 
		$this->show('institutions/create',[
				'title'=>"Création d'un etablissement",
				'name'=>$name,
				'address'=>$address,
				'postal_code'=>$postal_code,
				'city'=>$city,
				'email'=>$email,
				'tel'=>$tel,
				'site'=>$site,
				'photos'=>$photos,
				'type_institution'=>$type_institution,
				'errors'=>$error,
				'institution_categories'=>$institution_categories
			]);
	}

	public function update($id)
	{
		//Definit les droits d'administration
		//$this->allowTo(array(0=>'moderator',1=>'administrator'));
		//Declarer toutes les valeurs par défault
		$error=null;
		$name=null;
		$address=null;
		$postal_code=null;
		$city=null;
		$tel=null;
		$email=null;
		$site=null;
		$id_departement=null;
		$photos=null;
		$type_institution=null;
		$institution_categories=$this->InstitutionCategoryManager->findAll();
		$error=array();
		// Verifier si la requete HTTP est post
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$save=true;
			//Récuperer les données du post
			$name=$_POST['name'];
			$address=$_POST['address'];
			$postal_code=$_POST['postal_code'];
			$city=$_POST['city'];
			$tel=$_POST['tel'];
			$email=$_POST['email'];
			$site=$_POST['site'];
			$photos=$_POST['photos'];
			$type_institution=$_POST['type_institution'];
			$id_institution_category=$_POST['id_institution_category'];

			//récuperer le departement via le code postal 
			$departement=substr($postal_code, 0, 2);

			$id_departement=$this->DepartementsManager->findByNumber($departement)['id'];
			//controle des données 
			if (empty($name))
			{
				$save=false;
				$error['name']="le champ nom ne pas etre vide";
			}
			if (empty($address))
			{
				$save=false;
				$error['address']="les champs addresse , code postal et ville ne doivent pas etre vide";
			}
			if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$save=false;
				$error['email']="l'email est incorrecte";
			}
			if (empty($tel))
			{
				$save=false;
				$error['tel']="le champ telephone ne doit pas etre vide";
			}
			if (empty($type_institution))
			{
				$save=false;
				$error['type_institution']="le champ type d'etablissement ne doit pas etre vide";
			}
			if (empty($id_institution_category))
			{
				$save=false;
				$error['id_institution_category']="le champ categorie ne doit pas etre vide";
			}
			//controller la validite des données
			if ($save)
			{
				$address="$address $postal_code $city";
				//Enregistre le docteur dans la bdd
				
				$institution=$this->InstitutionsManager->update([
					'name'=>$name,
					'address'=>$address,
					'email'=>$email,
					'site'=>$site,
					'tel'=>$tel,
					'email'=>$email,
					'id_departement'=>$id_departement,
					'photos'=>$photos,
					'type_institution'=>$type_institution,
					'id_institution_category'=>$id_institution_category
					],$id);
				//Redirige vers la page de details de l'etablissement
				$this->redirectToRoute('institution_details',['id'=>$id]);
			}

		}
		//Appeller la vue
		$this->show('institutions/update',[
				'title'=>'Modifier un etablissement',
				'name'=>$name,
				'address'=>$address,
				'postal_code'=>$postal_code,
				'city'=>$city,
				'tel'=>$tel,
				'email'=>$email,
				'site'=>$site,
				'id_departement'=>$id_departement,
				'photos'=>$photos,
				'type_institution'=>$type_institution,
				'institution_categories'=>$institution_categories,
				'errors'=>$error
			]);
		
	}

	public function delete($id)
	{
		//Definit les droits d'administrateur
		// $this->allowTo(array('moderator','administrator'));
		$this->InstitutionsManager->delete($id);
		$this->redirectToRoute('institutions_index');
	}
}