<?php 
//require_once('../controllers/database.php');
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>


<?php
	if (isset($_GET['name'])){
		return_ajax_for_username();
	}
	if (isset($_GET['groupname'])){
		return_ajax_for_group();
	}
	
	function return_ajax_for_username(){
		$user = new User();
		$exists = $user->verify_name_exists_in_table($_GET['name'],'users');
		if ($exists){
			echo '1';
		}else{
			echo '0';
		}
	}
	
	function return_ajax_for_group(){
		$group = new Group();
		$exists = $group->verify_name_exists_in_table($_GET['groupname'],'groups');
		if ($exists){
			echo '1';
		}else{
			echo '0';
		}
	}

	function return_ajax_for_detail_type(){

	}

?>
