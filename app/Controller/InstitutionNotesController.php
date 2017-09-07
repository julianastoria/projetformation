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

		$this->UsersManager= new UsersManager;
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
				
				//Verifie les données sont correcte
				if ($save)
				{
					//Récupere l'id de l'utilisateur 
					$id_user=$_SESSION['user']['id'];
					//Réunit tous les sous note 
					$sub_notes="$sub_notes1;$sub_notes2;$sub_notes3";
					//Introduit les données vers la BDD
					$note_data=[
							'sub_notes'=>$sub_notes,
							'average'=>0,
							'title_comment'=>$title_comment,
							'comment'=>$comment,
							'post_date'=>date('d-M-Y'),
							'id_institution'=>$Institution['id'],
							'id_user'=>$id_user,
							'nb_like'=>0,
							'nb_dislike'=>0
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
		$this->show('institution_note/update');
	}
	public function delete ($id)
	{
		$this->show('institution_note/delete');
	}

}