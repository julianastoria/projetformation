<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\DoctorsManager;
use \Manager\DoctorCategoriesManager;
use \Manager\DepartementsManager;

class DoctorsController extends Controller
{
	function __construct()
	{
		$this->doctors_m = new DoctorsManager;
		$this->doctor_categories_m = new DoctorCategoriesManager;
		$this->doctor_categories_m->setTable('doctor_categories');
		$this->departements_m = new DepartementsManager;
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

	public function read()
	{
		$this->show('doctors/read');
	}

	public function create()
	{
		$postal_code = null;

		$save = true;

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$postal_code = $_POST['postal_code'];
			
			// Vérification des données

			// Récupération du département en fonction du code postal
			$departement = substr($postal_code, 0, 2);

			$departement = $this->departements_m->findByNumber($departement);
		}

		$this->show('doctors/create');
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