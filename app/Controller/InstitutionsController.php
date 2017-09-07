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
		$departement_list=$this->DepartementsManager->findAll();
		$categories_list=$this->InstitutionCategoryManager->findAll();
		$institution_list_without_departement_categories=$this->InstitutionsManager->findAll();
		var_dump($departement_list);
		var_dump($categories_list);
		var_dump($institution_list_without_departement_categories);
		foreach ($institution_list_without_departement_categories as $key => $value) {
			foreach ($institution_list_without_departement_categories[$key] as $institution_key => $institution) {
					var_dump($institution);
				}	
		}
		
		$this->show('institutions/index');
	}

	public function read()
	{
		$this->show('institutions/read');
	}

	public function create()
	{
		$this->show('institutions/create');
	}

	public function update()
	{
		$this->show('institutions/update');
	}

	public function delete()
	{
		$this->show('institutions/delete');
	}
}