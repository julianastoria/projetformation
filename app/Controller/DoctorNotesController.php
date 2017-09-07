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

		$this->DoctorNotesManager= new DoctorNotesManager;
	}

	private function averageNotes ($arraynotes)
	{
		$max=null;
		$i=null;
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
		if (!empty($_SESSION))
		{
			$sub_notes1=null;
			$sub_notes2=null;
			$sub_notes3=null;
			$title_comment=null;
			$comment='';
			$error=array();
			//Recupere les données du medecin
			$DoctorsManager= new DoctorsManager;
			$Doctor=$DoctorsManager->find($id);

			//
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
				
				//Verifie les données sont correcte
				if ($save)
				{
					//Récupere l'id de l'utilisateur 
					$id_user=$_SESSION['user']['id'];
					//Réunit tous les sous note 
					$sub_notes="$sub_notes1;$sub_notes2;$sub_notes3";
					//Introduit les données vers la BDD
					$this->DoctorNotesManager->insert([
							'sub_notes'=>$sub_notes,
							'average'=>0,
							'title_comment'=>$title_comment,
							'comment'=>$comment,
							'post_date'=>date('d-M-Y'),
							'id_doctor'=>$Doctor['id'],
							'id_user'=>$id_user,
							'nb_like'=>0,
							'nb_dislike'=>0
						]);
					//Redirige vers la page de la note 
					$this->redirectToRoute('doctor_details',['id'=>$Doctor['id'],]);
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
		if (isset($_SESSION))
		{
			// Récupere l'id de l'utilisateur qui a cree la note 
			$user=$this->DoctorNotesManager->find($id);
			$id_user=$user['id'];
			//Verifie si l'utilisateur est propriétaire de la note ou si il est modo ou admin 
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
						//Réunit tous les sous note 
						$sub_notes="$sub_notes1;$sub_notes2;$sub_notes3";
						//Introduit les données vers la BDD
						$note_data=[
								'sub_notes'=>$sub_notes,
								'title_comment'=>$title_comment,
								'comment'=>$comment,
								'post_date'=>date('d-M-Y'),
							];
						$this->DoctorNotesManager->update($note_data,$id);
						//Redirige vers la page de la note 
						$this->redirectToRoute('doctor_details',['id'=>$id_doctor]);
					}
				}
				$this->show('doctor_note/update',[
						'errors'=>$error,
					]);
			}
		} else {
			//Redirige de details du medecin
			$this->redirectToRoute('doctor_read',['id'=>$id_doctor]);
		}
		
	}
	public function delete ($id)
	{
		//Verifie si l'utilisateur est connecte 
		if (isset($_SESSION))
		{
			// Récupere l'id de l'utilisateur qui a cree la note 
			$user=$this->DoctorNotesManager->find($id);
			$id_user=$user['id'];

			//Verifie si l'utilisateur est propriétaire de la note ou si il est modo ou admin 
			if ($id_user===$_SESSION['user']['id'] || $_SESSION['user']['roles'] === 'moderator' || $_SESSION['user']['roles'] === 'administrator') 
			{
				$this->DoctorNotesManager->delete($id);
			}	
		} else {
			//Récupere les données du docteur
			$id_doctor=$this->DoctorNotesManager->find($id)['id_doctor'];
			//Redirige de details du medecin
			$this->redirectToRoute('doctor_read',['id'=>$id_doctor]);
		}
	}

}