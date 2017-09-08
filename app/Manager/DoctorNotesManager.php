<?php 

namespace Manager;

use \W\Manager\Manager;

class DoctorNotesManager extends Manager 
{
	public function findAllMainNotes($id)
	{
		$sql = "SELECT main_note FROM institution_notes WHERE id_institution = :id ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id);
		$sth->execute();
		return $sth->fetchAll();
	}
}