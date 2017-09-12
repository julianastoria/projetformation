<?php

namespace Manager;

use \W\Manager\Manager;

class DoctorNotesManager extends Manager 
{
	

	public function findAllMainNotes($id)
	{
		$sql = "SELECT main_note FROM doctor_notes WHERE id_doctor = :id ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id);
		$sth->execute();
		return $sth->fetchAll();
	}
}