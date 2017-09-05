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
		$average=null;
		$title=null;
		$comment=null;
		$error=null;
		//Verifie si l'utilisateur est connecte 
		/*if (isset($_SESSION))
		{*/
			//Recupere les données de l'etablissement
			$DoctorsManager= new DoctorsManager;
			$Doctor=$DoctorsManager->find($id);
			$sub_notes1='Accueil';
			$sub_notes2='Qualité d’écoute';
			$sub_notes3='Inspire confiance';
			$user=$_SESSION['user'];
			//verifie si la requete HTTP est POST
			if ($_SERVER['REQUEST_METHOD'] === "POST")
			{
				$save=true;
				//Recupere les données du POST
				$average=$_POST['average'];
				$sub_notes1=$_POST['sub_notes1'];				
				$sub_notes2=$_POST['sub_notes2'];				
				$sub_notes3=$_POST['sub_notes3'];								
				$title=$_POST['title'];
				$comment=$_POST['commentaire'];

				//Controle les données 
				if (empty($title))
				{
					$save=false;
					$error='le champ titre est vide';
				}
				if (empty($comment))
				{
					$save=false;
					$error='le champ commentaire est vide';
				}
				else if (strlen($comment) < 200)
				{
					$save=false;
					$error='le commentaire est trop court';
				}
				if (empty($sub_notes1) || empty($sub_notes2) || empty($sub_notes3))
				{
					$save=false;
					$error='les 3 notes doivent etre notés';
				}
				
				//Verifie les données sont correcte
				if ($save)
				{
					//Introduit les données vers la BDD
					$this->NotesInstitutionManager->insert([
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
					'title'=>"Création d'une note",
					'sub_notes1'=>$sub_notes1,
					'sub_notes2'=>$sub_notes2,
					'sub_notes3'=>$sub_notes3,
					'error'=>$error
				]);
		/*} else {
			$this->redirectToRoute('user_signin');
		}*/
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