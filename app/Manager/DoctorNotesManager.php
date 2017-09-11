<?php

namespace Manager;

use \W\Manager\Manager;

class DoctorNotesManager extends Manager 
{
	/*public function hasNoted()
	{
		$sql = "SELECT * FROM doctor_notes";
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		$sth->fetchAll();
		return $sth;
	}*/

	public function findAllMainNotes($id)
	{
		$sql = "SELECT main_note FROM doctor_notes WHERE id_doctor = :id ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id',$id);
		$sth->execute();
		return $sth->fetchAll();
	}
}