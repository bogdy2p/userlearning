<?php 
//require_once('../controllers/database.php');
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php
	if (isset($_GET['name'])){
		return_ajax_for_username($_GET['name']);
	}
	if (isset($_GET['edit_username'])){
		return_ajax_for_username($_GET['edit_username']);
	}

	if (isset($_GET['groupname'])){
		return_ajax_for_group($_GET['groupname']);
	}
	if (isset($_GET['edit_groupname'])){
		return_ajax_for_group($_GET['edit_groupname']);
	}
	
	if (isset($_GET['detail_name'])){
		return_ajax_for_detail_type($_GET['detail_name']);
	}
		if (isset($_GET['edit_detail'])){
		return_ajax_for_detail_type($_GET['edit_detail']);
	}
	
	
	function return_ajax_for_username($input){
		$user = new User();
		$exists = $user->verify_name_exists_in_table($input,'users');
		if ($exists){
			echo '1';
		}else{
			echo '0';
		}
	}
	
	function return_ajax_for_group($input){
		$group = new Group();
		$exists = $group->verify_name_exists_in_table($input,'groups');
		if ($exists){
			echo '1';
		}else{
			echo '0';
		}
	}

	function return_ajax_for_detail_type($input){
		$user = new User();
		$exists = $user->check_detail_type_exists($input);
		if ($exists){
			echo '1';
		}else{
			echo '0';
		}
	}
?>
