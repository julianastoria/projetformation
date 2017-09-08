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

		$this->allowTo('moderator');
		$error=null;
		// Verifier si la requete HTTP est post
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$save=true;
		}
		$this->show('institutions/create');
	}

	public function update($id)
	{
		$this->show('institutions/update');
	}

	public function delete()
	{
		$this->show('institutions/delete');
	}
}