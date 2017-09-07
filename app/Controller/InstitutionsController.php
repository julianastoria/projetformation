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
		//$insitution_lst1 represente la premier liste avec les ids 
		$institution_list1=$this->InstitutionsManager->findAll();
		// parcourir tous les etablissements
		foreach ($institution_list1 as $key => $value) {

			foreach ($value as $institution_key => $institution_value) {

					//Si la clée actuelle est id_departement elle sera ecrasée avec le departement en valeur
					if($institution_key==='id_departement')
					{
						$institutions_list2[$key]['departement']=$this->DepartementsManager->find($institution_value)['name'];
					//Si la clée actuelle est id_institution_category elle sera ecrasée avec la categorie en valeur
					}else if ($institution_key==='id_institution_category')
					{
						$institutions_list2[$key]['category']=$this->InstitutionCategoryManager->find($institution_value)['name'];
					}
					// Sinon laisse le tableau telle quelle
					else {
						$institutions_list2[$key][$institution_key]=$institution_value;
					}
				}	
		}	

		$this->show('institutions/index',['institutions'=>$institutions_list2]);
	}

	public function read($id)
	{
		$institution=$this->InstitutionsManager->find($id);

		foreach ($institution as $key => $value) {
			if ($key==='id_departement')
			{
				$institution['departement']=$this->DepartementsManager->find($value)['name'];
			}
			else if ($key==='id_institution_category')
			{
				$institution['category']=$this->InstitutionCategoryManager->find($value)['name'];
			}
			else {
				$institution[$key]=$value;
			}
		}
		var_dump($institution);
		$this->show('institutions/read');
	}

	public function create()
	{

		$this->allowTo('moderator');
		$error=null;
		// Verifier si la requete HTTP est post
		if ($_SERVER['REQUEST_METHOD'] === "POST")
				{
					$save=true;

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