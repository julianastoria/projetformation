<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\InstitutionsNotesManager;
use \Manager\InstitutionsManager;

class InstitutionsNotesController extends Controller 
{

	private $InstutionsNotesManager;

	
	public function __construct()
	{

		$this->InstitionsNotesManager= new InstitutionsNotesManager;
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
		$error=array();
		//Verifie si l'utilisateur est connecte 
		/*if (isset($_SESSION))
		{*/
			//Recupere le type de l'etablissement
			$InstitutionsManager= new InstitutionsManager;
			$Institution=$InstitutionsManager->find($id);
			$type_institution=$Institution['type_institution'];
			$sub_notes1='Accueil';
			var_dump($Institution);
			if ($type_institution === 'École')
			{
				
				$sub_notes2='Inclusion sociale';
				$sub_notes3='Adaptation envers l’autisme';
			} 
			else 
			{
				$sub_notes2='Prise en charge';
				$sub_notes3='Inspire confiance';
			}

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
					$average=
					//Introduit les données vers la BDD
					$this->NotesInstitutionManager->insert([
							'average'=>$average,
							'sub_note'=>$sub_note,
							'title_comment'=>$title,
							'post_date'=>date('d-M-Y'),
							'id_institution'=>$Institution['id'],
							'comment'=>$comment
						]);
					//Redirige vers la page de la note 
					$this->redirectToRoute('note_read');
				}
					
			}
			$this->show('institution_note/create',[
					'id'=>$id,
					'title'=>"Création d'une note",
					'sub_notes1'=>$sub_notes1,
					'sub_notes2'=>$sub_notes2,
					'sub_notes3'=>$sub_notes3,
					'errors'=>$error
				]);
		/*} else {
			$this->redirectToRoute('user_signin');
		}*/
	}
	public function read ($id)
	{
		$this->show('note/read',[
				'notes'=>$notes
			]);
	}
	public function update ($id)
	{
		$this->show('note/update');
	}
	public function delete ($id)
	{
		$this->show('note/delete');
	}

}