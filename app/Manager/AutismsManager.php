<?php 

namespace Manager;

use \W\Manager\Manager;

class AutismsManager extends Manager 
{
	public function findByName($name)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE name = :name LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":name", $name);
		$sth->execute();

		return $sth->fetch();
	}
}