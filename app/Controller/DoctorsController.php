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

	public function index()
	{
		$this->show('doctors/index', [
			'doctors' => $this->doctors_m->findAll()
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

			var_dump($postal_code, $departement);

			$departement = $this->departements_m->findByNumber($departement);

			var_dump($departement);
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