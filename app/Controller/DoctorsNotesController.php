<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\DoctorsNotesManager;
use \Manager\DoctorsManager;

class DoctorsNotesController extends Controller 
{

	private $DoctorsNotesManager;

	
	public function __construct()
	{

		$this->DoctorsNotesManager= new DoctorsNotesManager;
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
		if (isset($_SESSION))
		{
			$sub_notes1=null;
			$sub_notes2=null;
			$sub_notes3=null;
			$title_comment=null;
			$comment=null;
			$error=array();
			//Recupere les données de l'etablissement
			$DoctorsManager= new DoctorsManager;
			$Doctor=$DoctorsManager->find($id);
			$title_sub_notes1='Accueil';
			$title_sub_notes2='Qualité d’écoute';
			$title_sub_notes3='Inspire confiance';
			$user=$_SESSION['user'];
			//verifie si la requete HTTP est POST
			if ($_SERVER['REQUEST_METHOD'] === "POST")
			{
				$save=true;
				//Recupere les données du POST
				$sub_notes1=$_POST['sub_notes1'];				
				$sub_notes2=$_POST['sub_notes2'];				
				$sub_notes3=$_POST['sub_notes3'];								
				$title=$_POST['title'];
				$comment=$_POST['comment'];

				//Controle les données 
				if (empty($title))
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
				else if (is_numeric($sub_notes1) && is_numeric($sub_notes2) && is_numeric($sub_notes3))
				{
					$save=false;
					$error['sub_notes']='les notes doivent etre des nombres';
				}
				
				//Verifie les données sont correcte
				if ($save)
				{
					//Introduit les données vers la BDD
					$this->DoctorsNotesManager->insert([
							'average'=>$average,
							'sub_note'=>$sub_note,
							'title_comment'=>$title,
							'post_date'=>date('d-M-Y'),
							'id_doctor'=>$Doctor['id'],
							'comment'=>$comment
						]);
					//Redirige vers la page de la note 
					$this->redirectToRoute('note_read');
				}
					
			}
			$this->show('doctor_note/create',[
					'id'=>$id,
					'title'=>"Création d'une note",
					'title_comment'=>$title_comment,
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
	public function read ($id)
	{
		$this->show('doctor_note/read',[
				'notes'=>$notes
			]);
	}
	public function update ($id)
	{
		$this->show('doctor_note/update');
	}
	public function delete ($id)
	{
		$this->show('doctor_note/delete');
	}

}