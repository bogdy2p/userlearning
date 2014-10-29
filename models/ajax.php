<?php 
//require_once('../controllers/database.php');
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>






<?php

	//function verify_name_exists_in_table($name,$table_name){
	//RETURNS TRUE OR FALSE
	
	function return_for_username(){
		$user = new User();
		$exists = $user->verify_name_exists_in_table($_GET['name'],'users');
		if ($exists){
			echo '1';
		}else{
			echo '0';
		}
	}



// THIS FUNCTION SHOULD BE ABLE TO BE CALLED FOR BOTH CHECKING USER EXISTENCE AND CHECKING GROUPS EXISTENCE
	if (isset($_GET['name'])){
		return_for_username();
	// $name = $_GET['name'];
	// $database = new Database();
	// $db = $database->dbConnect();;
	// $statement = $db->prepare("SELECT * FROM users WHERE name = ?");
	// $statement->bindParam(1,$name);
	// $statement->execute();
	//print_r($statement->rowCount()); 
	}
?>
