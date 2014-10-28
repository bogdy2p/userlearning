<?php

class Changelog extends Crud { 
	//Constructor function for class Changelog.
	function __construct(){
		parent::__construct('changelog');
	}
	 function create($array,$table = 'app_changelog'){
		return parent::create($array,$table);
	}
	function read($table_name = 'app_changelog'){
		return parent::read($table_name);
	}
	
	 function list_changelog($table_name = 'app_changelog'){
		return parent::read($table_name);
	}

	function read_changelogs($table_name = 'app_changelog'){
		$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	  	$statement = $this->db->prepare("SELECT * FROM app_changelog ORDER BY date DESC");
	  	$statement->execute();
	  	return $statement;
	 }

	 function create_changelog_row($name,$colour){
	 	$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	 	$date_created = time();
	 	$statement = $this->db->prepare("INSERT INTO app_changelog (name,colour,date) VALUES (?,?,NOW())");
	 	$statement->bindParam(1,$name);
	 	$statement->bindParam(2,$colour);
	 	$statement->execute();
	}

	function read_changelogs_for_last_24_hours($day,$limit){
		$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	  	$statement = $this->db->prepare("SELECT * FROM app_changelog WHERE date >= NOW() - INTERVAL 1 DAY ORDER BY date DESC  ");
	  	$statement->bindParam(1,$day);
	  	$statement->bindParam(2,$limit);
	  	$statement->execute();
	  	// print_r($statement);
	  	return $statement;
	}

	function read_changelogs_for_last_x_days($days = '0'){
		$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	  	$statement = $this->db->prepare("SELECT * FROM app_changelog WHERE date >= CURDATE() - ? ORDER BY date DESC");
	  	$statement->bindParam(1,$days);
	  	$statement->execute();
	  	// print_r($statement);
	  	return $statement;
	}

}
?>