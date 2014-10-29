<?php 

header('Content-Type: text/json');

require_once('../controllers/database.php');

	if (isset($_GET['name'])){
	$name = $_GET['name'];
	$database = new Database();
	$db = $database->dbConnect();;
	$statement = $db->prepare("SELECT * FROM users WHERE name = ?");
	$statement->bindParam(1,$name);
	$statement->execute();
	print_r($statement->rowCount()); 
	}

?>
<?php

 ?>