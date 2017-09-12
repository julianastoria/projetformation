<?php 

namespace Manager;

use \W\Manager\Manager;

class InstitutionNotesManager extends Manager 
{
	//Methode pour recuperer toutes les notes moyennes 
	public function findAllMainNotes($id)
	{
		$sql = "SELECT main_note FROM institution_notes WHERE id_institution = :id ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id);
		$sth->execute();
		return $sth->fetchAll();
	}
	//Methode pour recuperer le type de l'etablissement
	public function findTypeInstitution($id)
	{
		$sql = "SELECT type_institution FROM institutions WHERE id= :id";
		
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();
		return $sth->fetch();
	}
	public function findByInstitution($id)
	{
		$sql = "SELECT * FROM institution_notes WHERE id_institution= :id";
		
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();
		return $sth->fetchAll();

	}
}