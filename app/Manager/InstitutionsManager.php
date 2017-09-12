<?php
namespace Manager;
use \W\Manager\Manager;
class InstitutionsManager extends Manager
{
	public function findAllWithDepartement()
	{
		$sql = "SELECT departements.name FROM " . $this->table . " LEFT JOIN departements ON id_departement = departements.id ORDER BY " . $this->table . ".id";
		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function findAllWithCategory()
	{
		$sql = "SELECT institution_categories.name FROM " . $this->table . " LEFT JOIN institution_categories ON id_institution_category = institution_categories.id ORDER BY " . $this->table . ".id";
		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function findWithDepartement($id)
	{
		$sql = "SELECT departements.name FROM " . $this->table .  " LEFT JOIN departements ON :id_departement = departements.id"; // WHERE id = :id
		
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_departement", $id);
		$sth->execute();
		return $sth->fetch();
	}
	public function findWithCategory($id)
	{
		$sql = "SELECT institution_categories.name FROM " . $this->table . " LEFT JOIN institution_categories ON :id_institution_category = institution_categories.id"; // WHERE id = :id
		
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_institution_category", $id);
		$sth->execute();
		return $sth->fetch();
	}
	
}