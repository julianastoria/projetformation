<?php

namespace Manager;

use \W\Manager\Manager;

class DoctorsManager extends Manager
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
		$sql = "SELECT doctor_categories.name FROM " . $this->table . " LEFT JOIN doctor_categories ON id_doctor_category = doctor_categories.id ORDER BY " . $this->table . ".id";
		
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function findWithDepartement($id)
	{
		if (!is_numeric($id)){
			return false;
		}
		$sql = "SELECT departements.name FROM " . $this->table . " LEFT JOIN departements ON id_departement = departements.id WHERE " . $this->table . ".id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();
		return $sth->fetch();
	}




	public function findWithCategory($id)
	{
		if (!is_numeric($id)){
			return false;
		}
		$sql = "SELECT doctor_categories.name FROM " . $this->table . " LEFT JOIN doctor_categories ON id_doctor_category = doctor_categories.id WHERE " . $this->table . ".id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();
		return $sth->fetch();
	}
}