<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\InstitutionNotesManager;
use \Manager\InstitutionsManager;
use \Manager\UsersManager;

class InstitutionNotesController extends Controller 
{

	private $InstitutionNotesManager;
	private $UsersManager;

	
	public function __construct()
	{

		$this->InstitutionNotesManager= new InstitutionNotesManager;
		$this->InstitutionNotesManager->setTable('institution_notes');

		$this->UsersManager= new UsersManager;
	}

	private function averageNotes ($arraynotes)
	{
		$max=0;
		$i=0;
		foreach ($arraynotes as $note)
		{
			$max+=int($note);
			$i++;
		}
		return $max/$i;
	}

	public function create ($id)
	{
		
		//Verifie si l'utilisateur est connecte 
		if (isset($_SESSION))
		{
			$sub_notes1=null;
			$sub_notes2=null;
			$sub_notes3=null;
			$title_comment=null;
			$comment="";
			$error=array();
			//Recupere le type de l'etablissement
			$InstitutionsManager= new InstitutionsManager;
			$Institution=$InstitutionsManager->find($id);
			$type_institution=$Institution['type_institution'];
			$title_sub_notes1='Accueil';
			if ($type_institution === 'École')
			{
				
				$title_sub_notes2='Inclusion sociale';
				$title_sub_notes3='Adaptation envers l’autisme';
			} 
			else 
			{
				$title_sub_notes2='Prise en charge';
				$title_sub_notes3='Inspire confiance';
			}
			//verifie si la requete HTTP est POST
			if ($_SERVER['REQUEST_METHOD'] === "POST")
			{
				$save=true;
				//Recupere les données du POST
				$sub_notes1=$_POST['sub_notes1'];				
				$sub_notes2=$_POST['sub_notes2'];				
				$sub_notes3=$_POST['sub_notes3'];								
				$title_comment=$_POST['title_comment'];
				$comment=$_POST['comment'];

				//Controle les données 
				if (empty($title_comment))
				{
					$save=false;
					$error['title_comment']='le champ titre est vide';
				}
				if (empty($comment))
				{
					$save=false;
					$error['comment']='le champ commentaire est vide';
				}
				else if (strlen($comment) < 200)
				{
					$save=false;
					$error['comment']='le commentaire est trop court';
				}
				if (empty($sub_notes1) || empty($sub_notes2) || empty($sub_notes3))
				{
					$save=false;
					$error['sub_notes']='les 3 notes doivent etre notés';
				}
				//Controle si l'utilisateur a deja noté 
				var_dump($this->InstitutionNotesManager->hasNoted($id_user));
				exit;
				if($this->InstitutionNotesManager->hasNoted($id_user))
				{
					$save=false;
					$error['user']="l'utilisateur a deja noté cet etablissement";
				}
				//Verifie les données sont correcte
				if ($save)
				{
						//Créer la note principale
						$main_note=($sub_notes1+$sub_notes2+$sub_notes3)/3;
						//Réunir les sous notes en un tableau de notes
						$sub_notes=array($sub_notes1,$sub_notes2,$sub_notes3);
						//Récupere l'id de l'utilisateur 
						$id_user=$_SESSION['user']['id'];	
						//Introduit les données vers la BDD
						$note_data=[
							'sub_notes'=>$sub_notes,
							'main_note'=>$main_note,
							'title_comment'=>$title_comment,
							'comment'=>$comment,
							'post_date'=>date('d:M:Y'),
							'id_institution'=>$Institution['id'],
							'id_user'=>$id_user,
							'nb_likes'=>0,
							'nb_dislikes'=>0
						];
					$this->InstitutionNotesManager->insert($note_data);
					//Redirige vers la page de la note 
					$this->redirectToRoute('institution_details',['id'=>$Institution['id']]);
				}
					
			}
			$this->show('institution_note/create',[
					'id'=>$id,
					'title'=>"Création d'une note",
					'title_comment'=>$title_comment,
					'comment'=>$comment,
					'title_sub_notes1'=>$title_sub_notes1,
					'title_sub_notes2'=>$title_sub_notes2,
					'title_sub_notes3'=>$title_sub_notes3,
					'sub_notes1'=>$sub_notes1,
					'sub_notes2'=>$sub_notes2,
					'sub_notes3'=>$sub_notes3,
					'errors'=>$error
				]);
		} else {
			$this->redirectToRoute('user_signin');
		}
	}
	public function update ($id)
	{
		//Récupere les données du docteur
		$id_institution=$this->InstitutionNotesManager->find($id)['id_institution'];
		//Verifie si l'utilisateur est connecté
		if (isset($_SESSION))
		{
			// Récupere l'id de l'utilisateur qui a cree la note 
			$user=$this->InstitutionNotesManager->find($id);
			$id_user=$user['id_user'];
			//Definir les criteres des sous notes
			$title_sub_notes1='Accueil';
			$title_sub_notes2='Qualité d’écoute';
			$title_sub_notes3='Inspire confiance';
			//Verifie si l'utilisateur est propriétaire de la note 
			if ($id_user===$_SESSION['user']['id'])
			{
				$error=array();
				$sub_notes1=null;
				$sub_notes2=null;
				$sub_notes3=null;
				$title_comment=null;
				$comment="";
				//Verifie si la requete http est post 
				if ($_SERVER['REQUEST_METHOD'] === "POST")
				{
					$save=true;

					//recupere les données du post 
					$title_comment=$_POST['title_comment'];
					$comment=$_POST['comment'];
					$sub_notes1=$_POST['sub_notes1'];				
					$sub_notes2=$_POST['sub_notes2'];				
					$sub_notes3=$_POST['sub_notes3'];
					//Controle les données
					if (empty($title_comment))
					{
						$save=false;
						$error['title_comment']='le champ titre est vide';
					}
					if (empty($comment))
					{
						$save=false;
						$error['comment']='le champ commentaire est vide';
					}
					else if (strlen($comment) < 200)
					{
						$save=false;
						$error['comment']='le commentaire est trop court';
					}
					if (empty($sub_notes1) || empty($sub_notes2) || empty($sub_notes3))
					{
						$save=false;
						$error['sub_notes']='les 3 notes doivent etre notés';
					}

					//Verifie les données 
					if ($save)
					{
						//Créer la note principale
						$main_note=($sub_notes1+$sub_notes2+$sub_notes3)/3;
						//Réunir les sous notes en un tableau de notes
						$sub_notes=array($sub_notes1,$sub_notes2,$sub_notes3);
						//Réunit tous les sous note 
						$sub_notes="$sub_notes1;$sub_notes2;$sub_notes3";
						//Introduit les données vers la BDD
						$note_data=[
								'sub_notes'=>$sub_notes,
								'main_note'=>$main_note,
								'title_comment'=>$title_comment,
								'comment'=>$comment,
								'post_date'=>date('d:M:Y'),
							];
						$this->InstitutionNotesManager->update($note_data,$id);
						//Redirige vers la page de la note 
						$this->redirectToRoute('institution_details',['id'=>$id_institution]);
					}
				}
				$this->show('institution_note/update',[
						'id'=>$id,
						'errors'=>$error,
						'title'=>"Création d'une note",
						'title_sub_notes1'=>$title_sub_notes1,
						'title_sub_notes2'=>$title_sub_notes2,
						'title_sub_notes3'=>$title_sub_notes3,
						'sub_notes1'=>$sub_notes1,
						'sub_notes2'=>$sub_notes2,
						'sub_notes3'=>$sub_notes3,
						'title_comment'=>$title_comment,
						'comment'=>$comment

					]);
			}
		} else {
			//Redirige vers la page de connexion
			$this->redirectToRoute('user_signin');
		}
		
	}
	public function delete ($id)
	{
		//Verifie si l'utilisateur est connecte 
		if (isset($_SESSION))
		{
			// Récupere l'id de l'utilisateur qui a cree la note 
			$note=$this->InstitutionNotesManager->find($id);
			$id_user=$note['id_user'];
			$id_institution=$note['id_institution'];
			//Verifie si l'utilisateur est propriétaire de la note ou si il est modo ou admin 
			if ($id_user===$_SESSION['user']['id'] || $_SESSION['user']['roles'] === 'moderator' || $_SESSION['user']['roles'] === 'administrator') 
			{
				$this->InstitutionNotesManager->delete($id);
				
			} else {
			//Récupere les données du docteur
			$id_institution=$this->InstitutionNotesManager->find($id)['id_institution'];
			//Redirige de details du medecin
			$this->redirectToRoute('institution_details',['id'=>$id_institution]);
			}
		}
		else 
		{
		$this->redirectToRoute('user_signin');
		}
	}

}