<?php 
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');


$id_to_delete = $_GET['id'];
$name = $id_to_delete;
echo $name;
$type_of_object = $_GET['type'];

if ($type_of_object == 'users'){
	$user = new User();
	$user->delete($id_to_delete);
	$user->delete_user_mapping($_GET['id']);
		header("Location: /user/views/view_list.php");
		die();
} elseif ($type_of_object == 'groups'){
	$group = new Group();
	$group->delete($id_to_delete);
	$group->delete_group_mapping($_GET['id']);
		header("Location: /user/views/view_list.php");
		die();
} elseif ($type_of_object == 'usergroups'){
	$user = new User();
	$user->delete_map_by_id($_GET['id']);
	header("Location: /user/views/view_list.php");
	die();
} elseif ($type_of_object == 'detail'){
	$user = new User();
	$user->delete_detail_type($name);
	header("Location: /user/views/view_detail_types.php");
	die();
}else {
	echo "Something went wrong while trying to delete.";
	echo '<a href="/user"><h4 align="center">Go back.</h4></a>';
}

?>