<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\DoctorsManager;
use \Manager\DoctorCategoriesManager;
use \Manager\DoctorsAutismsManager;
use \Manager\DepartementsManager;
use \Manager\AutismsManager;

class DoctorsController extends Controller
{
	function __construct()
	{
		$this->doctors_m = new DoctorsManager;

		$this->doctor_categories_m = new DoctorCategoriesManager;
		$this->doctor_categories_m->setTable('doctor_categories');

		$this->doctors_autisms_m = new DoctorsAutismsManager;
		$this->doctors_autisms_m->setTable('doctors_autisms');

		$this->departements_m = new DepartementsManager;

		$this->autisms_m = new AutismsManager;

	}



	public function ajaxDepartement()
	{
		$pc = isset($_GET['pc']) ? $_GET['pc'] : null;
		if ($pc) {
			$departement = substr($pc, 0, 2);

			$data = $this->departements_m->findByNumber($departement);

			$this->showJson($data);
		}
	}



	public function index()
	{

		if (empty($_GET['page']) || $_GET['page']<1 )
		{
			$page=1;
		}
		else
		{
			$page=intval($_GET['page']);
		}
		$limit=1;
		$offset=($page-1)*1;
		$doctors = $this->doctors_m->findAll('id',"ASC",1,$offset);
		$doctors_dp = $this->doctors_m->findAllWithDepartement();
		$doctors_cat = $this->doctors_m->findAllWithCategory();


		for ($i = 0; $i < count($doctors); $i++) { 
			$doctors[$i]['name_departement'] = $doctors_dp[$i]['name'];
			$doctors[$i]['name_doctor_category'] = $doctors_cat[$i]['name'];
		}
		// Definir la page max 
		//--- Récuperer le nombre d'etablissement
		$nbresdoctors=count($this->doctors_m->findAll());
		//--- Calcule le nombre de page max 
		$pagemax= $nbresdoctors/$limit;
		$this->show('doctors/index', [
			'doctors' => $doctors,
			'page'=>$page,
			'page_max'=>$pagemax
			]);
	}



	public function read($id)
	{
		// Récupération du médecin
		$doctor = $this->doctors_m->find($id);
		$doctor_dp = $this->doctors_m->findWithDepartement($id);
		$doctor_cat = $this->doctors_m->findWithCategory($id);
		$doctor['name_departement'] = $doctor_dp['name'];
		$doctor['name_doctor_category'] = $doctor_cat['name'];

		// Appel de la vue avec passage des données du médecin
		$this->show('doctors/read', [
			'doctor' => $doctor
			]);
	}



	public function create()
	{
		$firstname 	 = null;
		$lastname 	 = null;

		$address 	 = null;
		$postal_code = null;
		$city		 = null;
		$departement = null;

		$tel 		 = null;
		$email 		 = null;
		$site		 = null;

		$category 	 = null;
		$autisms 	 = array();
		$save = true;

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$firstname 	 = $_POST['firstname'];
			$lastname	 = $_POST['lastname'];

			$address 	 = $_POST['address'];
			$postal_code = $_POST['postal_code'];
			$city		 = $_POST['city'];
			$departement = $_POST['departement'];

			$tel 		 = $_POST['tel'];
			$email 		 = $_POST['email'];
			$site 		 = $_POST['site'];

			$category 	 = $_POST['category'];

			$autisms['haut_niveau']  = isset($_POST['haut_niveau']) ? "haut_niveau" : null;
			$autisms['asperger'] 	 = isset($_POST['asperger']) 	? "asperger" 	: null;
			$autisms['atypique'] 	 = isset($_POST['atypique']) 	? "atypique" 	: null;


			// Vérification des données
				// Récupération du département en fonction du code postal
			$departement = substr($postal_code, 0, 2);
			$departement = $this->departements_m->findByNumber($departement);
				// Récupération de l'id du 'doctor_category'
			$category = $this->doctor_categories_m->findByName($category);

			if ($save)
			{

				// Concaténation des trois string correspondant au champ 'address' dans la table 'doctors'
				$address .= "|".$postal_code."|".$city;

				// Enregistrement des données dans la BdD
					// Table 'doctors'
				$doctor = $this->doctors_m->insert([
					"firstname"			 => $firstname,
					"lastname" 			 => $lastname,
					"address" 			 => $address,
					"id_departement"	 => $departement['id'],
					"tel" 				 => $tel,
					"email" 			 => $email,
					"site" 				 => $site,
					"id_doctor_category" => $category['id']
				]);
					// Table 'doctors_categories'
				// if (!empty($autisms))
				foreach ($autisms as $key => $autism)
				{
					if (!empty($autism))
					{
						$id_autism = $this->autisms_m->findByName($autism);
						$id_autism = $id_autism['id'];
						$this->doctors_autisms_m->insert([
							"id_autism" => $id_autism,
							"id_doctor" => $id_doctor
						]);
					}
				}
				// Redirection vers la page d'index des médecins
				$this->redirectToRoute('doctors_index', ['id' => $doctor['id']]);
			}
		}
		$this->show('doctors/create', [
			"firstname" 	=> $firstname,
			"lastname" 		=> $lastname,
			"address" 		=> $address,
			"postal_code" 	=> $postal_code,
			"city"			=> $city,
			"departement" 	=> $departement['name'],
			"tel" 			=> $tel,
			"email" 		=> $email,
			"site" 			=> $site,
			"category" 		=> $category,
			"autisms"		=> $autisms,
			"checkbox_hidden" => "hidden"
		]);
	}


	public function update($id_doctor)
	{
		$doctor = $this->doctors_m->find($id_doctor);

		$autisms_db = $this->doctors_autisms_m->findAllWithDoctorId($id_doctor);
		
		// Sépare l'adresse en trois morceaux pour le formulaire
		$doctor['address'] = explode("|", $doctor['address']);

		$firstname 	 = $doctor['firstname'];
		$lastname 	 = $doctor['lastname'];

		$address 	 = $doctor['address'][0];
		$postal_code = $doctor['address'][1];
		$city		 = $doctor['address'][2];

		$departement = $this->departements_m->find($doctor['id_departement']);
		$departement = $departement['name']; // À MODIFIER

		$tel 		 = $doctor['tel'];
		$email 		 = $doctor['email'];
		$site		 = $doctor['site'];

		$category = $this->doctor_categories_m->find($doctor['id_doctor_category']);
		$category 	 = $category['name'];

		$specialities = array();

		foreach ($autisms_db as $key => $autism) {
			// $autism = $this->autisms_m->find($autism['id_autism']);
			array_push($specialities, $this->autisms_m->find($autism['id_autism'])['name']);

			$specialities[$specialities[$key]] = $specialities[$key];
			unset($specialities[$key]);
		}

		$save = true;
		$autisms = array();

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$firstname 	 = $_POST['firstname'];
			$lastname	 = $_POST['lastname'];

			$address 	 = $_POST['address'];
			$postal_code = $_POST['postal_code'];
			$city		 = $_POST['city'];
			$departement = $_POST['departement'];

			$tel 		 = $_POST['tel'];
			$email 		 = $_POST['email'];
			$site 		 = $_POST['site'];

			$category 	 = $_POST['category'];

			$autisms['haut_niveau']  = isset($_POST['haut_niveau']) ? "haut_niveau" : null;
			$autisms['asperger'] 	 = isset($_POST['asperger']) 	? "asperger" 	: null;
			$autisms['atypique'] 	 = isset($_POST['atypique']) 	? "atypique" 	: null;

			// Vérification des données
				// Récupération du département en fonction du code postal
			$departement = substr($postal_code, 0, 2);
			$departement = $this->departements_m->findByNumber($departement);

				// Récupération de l'id du 'doctor_category'
			$category = $this->doctor_categories_m->findByName($category);

			if ($save)
			{
				// Concaténation des trois string correspondant au champ 'address' dans la table 'doctors'
				$address .= "|".$postal_code."|".$city;

				// Enregistrement des données dans la BdD
					// Table 'doctors'
				$doctor = $this->doctors_m->update([
					"firstname"			 => $firstname,
					"lastname" 			 => $lastname,

					"address" 			 => $address,
					"id_departement"	 => $departement['id'],

					"tel" 				 => $tel,
					"email" 			 => $email,
					"site" 				 => $site,

					"id_doctor_category" => $category['id']
				], $id_doctor);

					// Table 'doctors_categories'
				// À FAIRE
				$this->doctors_autisms_m->delete($id_doctor);

				foreach ($autisms as $key => $autism)
				{
					if (!empty($autism))
					{
						$id_autism = $this->autisms_m->findByName($autism);
						$id_autism = $id_autism['id'];
						$this->doctors_autisms_m->insert([
							"id_autism" => $id_autism,
							"id_doctor" => $id_doctor
						]);
					}
				}

				// Redirection vers la page de détail du médecin traité
				$this->redirectToRoute('doctor_details', [
					'id' => $id_doctor
				]);
			}
		}

		$this->show('doctors/update', [
			"firstname" 	=> $firstname,
			"lastname" 		=> $lastname,
			"address" 		=> $address,
			"postal_code" 	=> $postal_code,
			"city"			=> $city,
			"departement" 	=> $departement,
			"tel" 			=> $tel,
			"email" 		=> $email,
			"site" 			=> $site,
			"category" 		=> $category,
			"autisms" => $specialities,
			"checkbox_hidden" => ($category != "Psychologue") ? "hidden" : null
		]);
	}



	public function delete($id)
	{
		$doctor = $this->doctors_m->find($id);
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->doctors_m->delete($id);
			$this->redirectToRoute('doctors_index');
		// } else {
		// $this->redirectToRoute('doctor_details', ['id' => $id]);
		}

		$this->show('doctors/delete');
	}
}