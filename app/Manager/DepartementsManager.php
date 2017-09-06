<<<<<<< HEAD
<?php 
=======
<?php
>>>>>>> develop

namespace Manager;

use \W\Manager\Manager;

<<<<<<< HEAD
class DepartementsManager extends Manager 
{
	public function findByName($name)
	{
		$sql = "SELECT * FROM departements WHERE name = :name LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":name", $name);
=======
class DepartementsManager extends Manager
{
	public function findByNumber($number)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE number = :number LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":number", $number);
>>>>>>> develop
		$sth->execute();

		return $sth->fetch();
	}
}