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
	
	 function list_changelogs($table_name = 'app_changelog'){
		return parent::read($table_name);
	}

	// function list_changelog_bydate_desc($table_name = 'app_changelog'){
	// 	$this->db = new Database();
	// 	$this->db = $this->db->dbConnect();
	//  	$statement = $this->db->prepare("SELECT * FROM app_changelog ORDER BY date_created DESC");
	//  	$statement->execute();
	//  	//print_r($statement);
	//  	return $statement;
	// }



	// function create_changelog_row($name,$message){
	// 	$this->db = new Database();
	// 	$this->db = $this->db->dbConnect();
	// 	$name = $name;
	// 	$date_created = time();
	// 	$statement = $this->db->prepare("INSERT INTO app_changelog (name,text,date_created) VALUES (?,?,NOW())");
	// 	$statement->bindParam(1,$name);
	// 	$statement->bindParam(2,$message);
	// 	$statement->execute();
	// }
}
?>