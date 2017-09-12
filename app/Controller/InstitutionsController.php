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
		$institutions = $this->InstitutionsManager->findAll();
		$institutions_dp = $this->InstitutionsManager->findAllWithDepartement();
		$institutions_cat = $this->InstitutionsManager->findAllWithCategory();

		for ($i = 0; $i < count($institutions); $i++) { 
			$institutions[$i]['name_departement'] = $institutions_dp[$i]['name'];
			$institutions[$i]['name_institution_category'] = $institutions_cat[$i]['name'];
			
		}
		$this->show('institutions/index', [
			'institutions' => $institutions,
			'title'=>'Liste des etablissement',
		]);
	}

	public function read($id)
	{

		$institution = $this->InstitutionsManager->find($id);
		$institution_dp = $this->InstitutionsManager->findWithDepartement($institution['id_departement']);
		$institution_cat = $this->InstitutionsManager->findWithCategory($institution['id_institution_category']); 
		$institution['name_departement'] = $institution_dp['name'];
		$institution['name_institution_category'] = $institution_cat['name'];
		
		if (!isset($institution['name_departement']))
		{
			$error="l'etablissement n'existe pas ou a ete supprimée";
			$title=null;
		} else {
			$title='les details sur '.$institution['name'];
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
			//Recuperer les critéres des sous notes 
			//--- Recuperer l'id de l'etalissement
			$id_institution[$i]=$notes[$i]['id_institution'];
			$type_institution[$i]=$this->InstitutionsManager->find($id_institution[$i])['type_institution'];
			//--- defenir les critere des sous notes en fonction du tpe trouvé
			$title_sub_notes1[$i]="Acceuil";
			if ($type_institution[$i] === 'École')
			{
				
				$title_sub_notes2[$i]='Inclusion sociale';
				$title_sub_notes3[$i]='Adaptation envers l’autisme';
			} 
			else if ($type_institution[$i] === 'Établissement spécialisé')
			{
				$title_sub_notes2[$i]='Prise en charge';
				$title_sub_notes3[$i]='Inspire confiance';
			}
			//Recuperer le commentaire et le titre 
			$title_comment[$i]=$notes[$i]['title_comment'];
			$comment[$i]=$notes[$i]['comment'];
		}
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
			'title_sub_notes1'=>$title_sub_notes1,			
			'title_sub_notes2'=>$title_sub_notes2,
			'title_sub_notes3'=>$title_sub_notes3
		]);
	}

	public function create()
	{

		//$this->allowTo(array('moderator','administrator'));
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
		//$this->allowTo(array(0=>'moderator',1=>'administrator'));
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
		$this->allowTo(array(0=>'moderator',1=>'administrator'));
		$this->InstitutionsManager->delete($id);
		$this->redirectToRoute('institutions_index');
	}
}