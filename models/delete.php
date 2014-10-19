<?php 
require_once('classes/database.php');
require_once 'classes/crud.php';
require_once('classes/user.php');
require_once('classes/group.php');


$id_to_delete = $_GET['id'];
$type_of_object = $_GET['type'];

if ($type_of_object == 'users'){
	$user = new User();
	$user->delete($id_to_delete);
		echo '<a href="/user"><h4 align="center">Go back.</h4></a>';
} elseif ($type_of_object == 'groups'){
	$group = new Group();
	$group->delete($id_to_delete);
		echo '<a href="/user"><h4 align="center">Go back.</h4></a>';
}else {
	echo "Something went wrong while trying to delete.";
		echo '<a href="/user"><h4 align="center">Go back.</h4></a>';
	
}






?>