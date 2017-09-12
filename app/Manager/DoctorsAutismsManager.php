<?php

namespace Manager;

use \W\Manager\Manager;

class DoctorsAutismsManager extends Manager
{
	public function insert(array $data, $stripTags = true)
	{

		$colNames = array_keys($data);
		$colNamesString = implode(", ", $colNames);

		$sql = "INSERT INTO " . $this->table . " ($colNamesString) VALUES (";
		foreach($data as $key => $value){
			$sql .= ":$key, ";
		}
		$sql = substr($sql, 0, -2);
		$sql .= ")";

		$sth = $this->dbh->prepare($sql);
		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(":".$key, $value);
		}

		if (!$sth->execute()){
			return false;
		}
		// return $this->find($this->lastInsertId());
	}



	public function delete($id_doctor)
	{
		if (!is_numeric($id_doctor)){
			return false;
		}

		$sql = "DELETE FROM " . $this->table . " WHERE id_doctor = :id_doctor";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_doctor", $id_doctor);
		return $sth->execute();
	}



	public function findAllWithDoctorId($id_doctor)
	{
		if (!is_numeric($id_doctor))
		{
			return false;
		}

		$sql = "SELECT * FROM " . $this->table . " WHERE id_doctor = :id_doctor";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id_doctor", $id_doctor);
		$sth->execute();

		return $sth->fetchAll();
	}
}