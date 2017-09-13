<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\DoctorNotesManager;
use \Manager\DoctorsManager;

class DoctorNotesController extends Controller 
{

	private $DoctorNotesManager;

	
	public function __construct()
	{
		$this->DoctorsManager= new DoctorsManager;
		$this->DoctorNotesManager= new DoctorNotesManager;
		$this->DoctorNotesManager->setTable('doctor_notes');
	}

	public function create ($id)
	{
		
		//Verifie si l'utilisateur est connecte 
		if (!empty($_SESSION['user']))
		{
			$sub_notes1=null;
			$sub_notes2=null;
			$sub_notes3=null;
			$title_comment=null;
			$comment='';
			$error=array();
			//Critères des sous notes
			$title_sub_notes1='Accueil';
			$title_sub_notes2='Qualité d’écoute';
			$title_sub_notes3='Inspire confiance';

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
				//Récupere l'id de l'utilisateur 
				$id_user=$_SESSION['user']['id'];
				var_dump($id_user);
				//Controle les données 
				if (empty($title_comment))
				{
					$save=false;
					$error['title']='le champ titre est vide';
				}
				if (empty($comment))
				{
					$save=false;
					$error['comment']='le champ commentaire est vide';
				}
				else if (strlen($comment) < 20)
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
				$notes=$this->DoctorNotesManager->findAll();

				foreach ($notes as $key => $note) {
					if ($_SESSION['user']['id']===$note['id_user']){
						$error['user']="l'utilisateur a deja noté cet etablissement";
						$save=false;
					}
				}			
				//Verifie les données sont correcte
				if ($save)
				{
					//Créer la note principale
					$main_note=($sub_notes1+$sub_notes2+$sub_notes3)/3;
					//Réunir les sous notes en un tableau de notes
					$sub_notes="$sub_notes1:$sub_notes2:$sub_notes3";
					//Introduit les données vers la BDD
					$note_data=[
							'sub_notes'=>$sub_notes,
							'main_note'=>$main_note,
							'title_comment'=>$title_comment,
							'comment'=>$comment,
							'post_date'=>date('d-m-Y G:i:s'),
							'id_doctor'=>intval($id),
							'id_user'=>intval($id_user),
							'nb_likes'=>0,
							'nb_dislikes'=>0
						];
					$this->DoctorNotesManager->insert($note_data);
					//Recalculer la note moyenne
					$main_notes=$this->DoctorNotesManager->findAllMainNotes($id)['main_notes'];
					
					if (!empty($main_notes)){
						$i=0;
						$max=0;
						foreach ($main_notes as $main_note) {
							$i+=1;
							$max+=intval($main_note['main_note']);
						}
						$average=$max/$i;
					} 
					else 
					{
						$average=$note_data['main_note'];
					}
			
					$this->DoctorsManager->update([
							'average'=>$average
						],$id);
					//Redirige vers la page de la note 
					$this->redirectToRoute('doctor_details',['id'=>$id]);
				}
					
			}
			$this->show('doctor_note/create',[
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
		$id_doctor=$this->DoctorNotesManager->find($id)['id_doctor'];
		//Verifie si l'utilisateur est connecté
		if (isset($_SESSION['user']))
		{
			// Récupere l'id de l'utilisateur qui a cree la note 
			$user=$this->DoctorNotesManager->find($id);
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
						$this->DoctorNotesManager->update($note_data,$id);
						//Recalculer la note moyenne
						$main_notes=$this->DoctorNotesManager->findAllMainNotes($id)['main_notes'];
						$i=0;
						$max=0;
						foreach ($main_notes as $main_note) {
							$i+=1;
							$max+=floatval($main_note['main_note']);
						}
						$average=$max/$i;

						$this->DoctorsManager->update([
							'average'=>$average
						],$id);
						//Redirige vers la page de la note 
						$this->redirectToRoute('doctor_details',['id'=>$id_doctor]);
					}
				}
				$this->show('doctor_note/update',[
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
		if (isset($_SESSION['user']))
		{
			// Récupere l'id de l'utilisateur qui a cree la note 
			$note=$this->DoctorNotesManager->find($id);
			$id_user=$note['id_user'];
			$id_doctor=$note['id_doctor'];

			//Verifie si l'utilisateur est propriétaire de la note ou si il est modo ou admin 
			if ($id_user===$_SESSION['user']['id'] || $_SESSION['user']['roles'] === 'moderator' || $_SESSION['user']['roles'] === 'administrator') 
			{
				$this->DoctorNotesManager->delete($id);
				//Recalculer la note moyenne
				$main_notes=$this->DoctorNotesManager->findAllMainNotes($id_doctor)['main_notes'];	
				if (!empty($main_notes)){
					$i=0;
					$max=0;
					foreach ($main_notes as $main_note) {
						$i+=1;
						$max+=floatval($main_note['main_note']);
					}
					$average=$max/$i;
				} 
				else 
				{
					$average=0;
				}

				$average=$max/$i;
				
				//Mettre a jour la moyenne dans la bdd 
				$this->DoctorsManager->update(['average'=>$average],$id_doctor);

				//Redirige vers la page de details du medecin
				$this->redirectToRoute('doctor_details',['id'=>$id_doctor]);
			} else {
			
				//Redirige de details du medecin
				$this->redirectToRoute('doctor_details',['id'=>$id_doctor]);
			}
		}
		else 
		{
		$this->redirectToRoute('user_signin');
		}
	}
}