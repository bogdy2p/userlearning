<?php 
 require_once('../controllers/database.php');
 require_once('../controllers/crud.php');
 require_once('../controllers/user.php');
 require_once('../controllers/group.php');
?>
<?php

class Log extends Crud { //CRUD IS THE CONTROLLER :| Rest are models... ?
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
	function update($id, $table = 'function_call_log', $update_params_array){
		return parent::update($id, $table, $update_params_array);
	}
	function delete($id, $table = 'function_call_log'){
		return parent::delete($id, $table);
	}

}




?>