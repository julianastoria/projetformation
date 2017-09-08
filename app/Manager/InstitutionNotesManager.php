<?php 

namespace Manager;

use \W\Manager\Manager;

class InstitutionNotesManager extends Manager 
{
	public function hasNoted($id)
	{
		if (!is_numeric($id)){
			return false;
		}

		$sql = "SELECT * FROM institution_notes WHERE id_user = :id_user LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetch();

	}
}