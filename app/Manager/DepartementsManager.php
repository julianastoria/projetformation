<?php

namespace Manager;

use \W\Manager\Manager;

class DepartementsManager extends Manager
{

	public function findByNumber($number)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE number = :number LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":number", $number);
		$sth->execute();
		
		return $sth->fetch();
	}
}