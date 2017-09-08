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
			'institutions' => $institutions
		]);
	}

	public function read($id)
	{
		$institutions = $this->InstitutionsManager->find($id);
		$institutions_dp = $this->InstitutionsManager->findWithDepartement($institutions['id_departement']);
		$institutions_cat = $this->InstitutionsManager->findWithCategory($institutions['id_institution_category']); 
		

			$institutions['name_departement'] = $institutions_dp['name'];
			$institutions['name_institution_category'] = $institutions_cat['name'];

		$this->show('institutions/read', [
			'institutions' => $institutions
		]);
	}

	public function create()
	{

		$this->allowTo(['moderator','administrator']);
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
		$id_institution_category=null;
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
			$id_departement=$_POST['id_departement'];
			$photos=$_POST['photos'];
			$type_institution['type_institution'];
			$id_institution_category=$_POST['id_institution_category'];

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
			if (§filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$save=false;
				$error['email']="l'email est incorrecte";
			}
			if (empty($tel))
			{
				$save=false;
				$error['tel']="le champ telephone ne doit pas etre vide";
			}
			if (empty($id_departement))
			{
				$save=false;
				$error['id_departement']="le champ departement ne doit pas etre vide";
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
				//Enregistre le docteur dans la bdd
				$institution=$this->InstitutionsManager->insert([
					'name'=>$name,
					'address'=>$address,
					'email'=>$email,
					'site'=>$site,
					'id_departement'=>$id_departement,
					'photos'=>$photos,
					'type_institution'=>$type_institution,
					'id_institution_category'=>$id_institution_category
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
				'id_departement'=>$id_departement,
				'photos'=>$photos,
				'type_institution'=>$type_institution,
				'id_institution_category'=>$id_institution_category,
				'errors'=>$error
			]);
	}

	public function update($id)
	{
		$this->allowTo(['moderator','administrator']);
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
		$id_institution_category=null;
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
			$id_departement=$_POST['id_departement'];
			$photos=$_POST['photos'];
			$type_institution['type_institution'];
			$id_institution_category=$_POST['id_institution_category'];

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
			if (§filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$save=false;
				$error['email']="l'email est incorrecte";
			}
			if (empty($tel))
			{
				$save=false;
				$error['tel']="le champ telephone ne doit pas etre vide";
			}
			if (empty($id_departement))
			{
				$save=false;
				$error['id_departement']="le champ departement ne doit pas etre vide";
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
					'id_departement'=>$id_departement,
					'photos'=>$photos,
					'type_institution'=>$type_institution,
					'id_institution_category'=>$id_institution_category
					],$id);
				//Redirige vers la page de details de l'etablissement
				$this->redirectToRoute('institution_details',['id'=>$institution['id']]);
			}

		}
		$this->show('institutions/update',[
				'title'=>'Ajouter un etablissement',
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
				'id_institution_category'=>$id_institution_category,
				'errors'=>$error
			]);
		
	}

	public function delete($id)
	{
		$this->allowTo(['moderator','administrator']);
		$this->InstitutionsManager->delete($id);
		$this->show('institutions/delete');
	}
}