<?php 
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');


$id_to_delete = $_GET['id'];
$type_of_object = $_GET['type'];

if ($type_of_object == 'users'){
	$user = new User();
	$user->delete($id_to_delete);
	$user->delete_user_mapping($_GET['id']);
		//REDIRECT BACK TO LIST HERE;
		header("Location: /user/views/view_list.php");
		die();
} elseif ($type_of_object == 'groups'){
	$group = new Group();
	$group->delete($id_to_delete);
	$group->delete_group_mapping($_GET['id']);
		//REDIRECT BACK TO LIST HERE;
		header("Location: /user/views/view_list.php");
		die();
} elseif ($type_of_object == 'usergroups'){
	$user = new User();
	$user->delete_map_by_id($_GET['id']);
	//echo '<a href="/user"><h4 align="center">Go back.</h4></a>';
	header("Location: /user/views/view_list.php");
	die();

}else {
	echo "Something went wrong while trying to delete.";
	echo '<a href="/user"><h4 align="center">Go back.</h4></a>';
	
}

?>