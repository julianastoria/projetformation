<?php 

namespace Manager;

use \W\Manager\Manager;

class UsersManager extends Manager 
{
	public function findByToken($token)
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE $this->token = :token LIMIT 1";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":token", $token);
		$sth->execute();

		return $sth->fetch();
	}
	public function findDepartement($id)
	{
		$sql = "SELECT name FROM departements LEFT JOIN users  ON :id_departement = departements.id";
		
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_departement", $id);
		$sth->execute();
		return $sth->fetch();
	}
	public function findAutism($id)
	{
		$sql = "SELECT name FROM autisms LEFT JOIN users ON :id_autism = autisms.id";
		
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_autism", $id);
		$sth->execute();
		return $sth->fetch();
	}
}