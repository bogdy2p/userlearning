<?php 
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
require_once('../controllers/function_call_log.php');

echo '<script type="text/javascript">
		alert("YOU ARE DELETING A USER !");
	</script>';

$id_to_delete = $_GET['id'];
$name = $id_to_delete;
echo $name;
$type_of_object = $_GET['type'];



if ($type_of_object == 'users'){
	
	$user = new User();
	$user->delete($id_to_delete);
	$user->delete_user_mapping($_GET['id']);
	$user->delete_user_details_for_this_user($id_to_delete);

			//LOG
			$log_message = 'Deleted user with id '.$name.' Deleted user\'s mapping and all set details';
			$log = new Log();
			$log->create_log('delete.php | users',$log_message);
			//END LOG
	
	header("Location: /user/views/view_list.php");
	die();

} elseif ($type_of_object == 'groups'){
	$group = new Group();
	$group->delete($id_to_delete);
	$group->delete_group_mapping($_GET['id']);
			//LOG
			$log_message = 'Deleted group with id '.$name.' Deleted group\'s mapping if exists';
			$log = new Log();
			$log->create_log('delete.php | groups',$log_message);
			//END LOG
	header("Location: /user/views/view_list.php");
	die();
} elseif ($type_of_object == 'usergroups'){
	$user = new User();
	$user->delete_map_by_id($_GET['id']);
			//LOG
			$log_message = 'Deleted mapping with id '.$name;
			$log = new Log();
			$log->create_log('delete.php | usergroups',$log_message);
			//END LOG
	header("Location: /user/views/view_list.php");
	die();
} elseif ($type_of_object == 'detail'){
	$user = new User();
	$user->delete_detail_type($name);
	$user->delete_user_details_for_deleted_type($name);
			//LOG
			$log_message = 'Deleted detail_type named '.$name.' Also deleted all details set of that type';
			$log = new Log();
			$log->create_log('delete.php | user_details',$log_message);
			//END LOG
	header("Location: /user/views/view_detail_types.php");
	die();
}else {
			//LOG
			$log_message = 'There was an error in here ! Last else !';
			$log = new Log();
			$log->create_log('delete.php',$log_message);
			//END LOG
	echo "Something went wrong while trying to delete.";
	echo '<a href="/user"><h4 align="center">Go back.</h4></a>';
}
?>
