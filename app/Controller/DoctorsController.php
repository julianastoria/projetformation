<?php
namespace Controller;
use \W\Controller\Controller;
use \Manager\DoctorsManager;
use \Manager\DoctorCategoriesManager;
use \Manager\DepartementsManager;
use \Manager\AutismsManager;
class DoctorsController extends Controller
{
	function __construct()
	{
		$this->doctors_m = new DoctorsManager;
		$this->doctor_categories_m = new DoctorCategoriesManager;
		$this->doctor_categories_m->setTable('doctor_categories');
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
		$doctors = $this->doctors_m->findAll();
		$doctors_dp = $this->doctors_m->findAllWithDepartement();
		$doctors_cat = $this->doctors_m->findAllWithCategory();
		for ($i = 0; $i < count($doctors); $i++) { 
			$doctors[$i]['name_departement'] = $doctors_dp[$i]['name'];
			$doctors[$i]['name_doctor_category'] = $doctors_cat[$i]['name'];
		}
		$this->show('doctors/index', [
			'doctors' => $doctors
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
		$haut_niveau = null;
		$asperger 	 = null;
		$atypique 	 = null;
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
			$autisms['haut_niveau']  = isset($_POST['haut_niveau']) ? "Haut niveau" : null;
			$autisms['asperger'] 	 = isset($_POST['asperger']) 	? "Asperger" 	: null;
			$autisms['atypique'] 	 = isset($_POST['atypique']) 	? "Atypique" 	: null;
			var_dump($autisms);
			$doctor = array();
			// Vérification des données
				// Récupération du département en fonction du code postal
			$departement = substr($postal_code, 0, 2);
			$departement = $this->departements_m->findByNumber($departement);
			if ($save)
			{
				// Enregistrement des données dans la BdD
					// Table 'doctors'
				// $doctor = $this->doctors_m->insert([
				// 	"firstname"   => $firstname,
				// 	"lastname" 	  => $lastname,
				// 	"address" 	  => $address,
				// 	"postal_code" => $postal_code,
				// 	"city" 		  => $city,
				// 	"departement" => $departement,
				// 	"tel" 		  => $tel,
				// 	"email" 	  => $email,
				// 	"site" 		  => $site,
				// 	"category"	  => $category
				// ]);
					// Table 'doctors_categories'
				foreach ($autisms as $key => $autism)
				{
					if (!empty($autism))
					{
						var_dump($autism);
						$id_autism = $this->autisms_m->findByName($autism);
						var_dump($id_autism);
						// $this->doctors_categories_m->insert([
						// 	""
						// ]);
					}
				}
				// Redirection vers la page des infos du produit avec l'id du produit enregistré
			}
		}
		$this->show('doctors/create', [
			"doctor" => $doctor
		]);
	}
	public function update()
	{
		$this->show('doctors/update');
	}
	public function delete()
	{
		$this->show('doctors/delete');
	}
}