<?php

class Log extends Crud { 
	//Constructor function for class Log.
	function __construct(){
		parent::__construct('log');
	}
	function create($array,$table = 'function_call_log'){
		return parent::create($array,$table);
	}
	function read($table_name = 'function_call_log'){
		return parent::read($table_name);
	}
	
	function list_logs($table_name = 'function_call_log'){
		return parent::read($table_name);
	}

	function list_logs_bydate_desc($limit){
		$this->db = new Database();
		$this->db = $this->db->dbConnect();
		$statement = $this->db->prepare("SELECT * FROM function_call_log ORDER BY date_created DESC LIMIT $limit");
		$statement->bindParam(1,$limit);
	 	$statement->execute();
	 	return $statement;
	}

	function list_last10_logs_bydate_desc($table_name = 'function_call_log'){
		$this->db = new Database();
		$this->db = $this->db->dbConnect();
	 	$statement = $this->db->prepare("SELECT * FROM function_call_log ORDER BY date_created DESC LIMIT 10");
	 	$statement->execute();
	 	return $statement;
	}

	function create_log($name,$message){
		$this->db = new Database();
		$this->db = $this->db->dbConnect();
		$name = $name;
		$date_created = time();
		$statement = $this->db->prepare("INSERT INTO function_call_log (name,text,date_created) VALUES (?,?,NOW())");
		$statement->bindParam(1,$name);
		$statement->bindParam(2,$message);
		$statement->execute();
	}
}
?>