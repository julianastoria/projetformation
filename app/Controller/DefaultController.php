<?php

namespace Controller;

use \W\Controller\Controller;

use \Manager\InstitutionsManager;
use \Manager\DoctorsManager;

class DefaultController extends Controller
{
	public function __construct()
	{
		$this->InstitutionsManager=new InstitutionsManager;
		$this->DoctorsManager= new DoctorsManager;
	}
	/**
	 * Page d'accueil par défaut
	 */
	public function home ()
	{
		//Recupere les 4 derniers medecins et etablissements
		$lastDoctor=$this->DoctorsManager->findAll('id','DESC',4);
		$lastInstitutions=$this->InstitutionsManager->findAll('id','DESC',4);
		$this->show('default/home',[
				'title'=>"Acceuil - Annautisma",
				'institutions'=>$lastInstitutions,
				'doctors'=>$lastDoctor
			]);
	}
	public function contact ()
	{
		$email=null;
		$message=null;
		$error=null;
		//verifie si la requete php est post
		if($_SERVER['REQUEST_METHOD'] === "POST")
		{
			//prend les données du post
			$email=$_POST['email'];
			$message=$_POST['message'];
			$save=true;

			//Verfie si le champ email est renseigné
			if (!isset($email))
			{
				$save=false;
				$error="le champ mail est vide";
			}
			//vérifie si l'email est valide
			else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$save=false;
				$error="l'email est incorrecte";
			}
			//Verfie si le champ message n'est pas vide 
			if (!isset($message))
			{
				$save=false;
				$error="le champ message est vide";

			} 
			// Vérifie si le message fait au moins 200 caracteres
			else if (strlen($message) < 200)
			{
				$save=false;
				$error="le message est trop court (200 caractere min)";
			}

			// Verifie si il n'y a aucune erreur 
			if ($save)	
			{
				//instancie le manager 
				$contactmanager=new ContactManager;

				//Enregistrer les données dans la BDD
				
				$contactmanager->insert([
						'email'=>$email,
						'message'=>$message
					]);

			}
		}	
	
		$this->show('default/contact',[
				'error'=>$error,
			]);
	}
	public function a_propos ()
	{
		$this->show('default/a_propos');
	}
	public function mentions_legales ()
	{
		$this->show('default/mentions_legales');
	}
}