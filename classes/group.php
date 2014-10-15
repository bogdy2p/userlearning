<?php 

class Group extends Crud {

	function __construct(){
		parent::__construct('group');
	}
	
	function setUserGroup($gid, $uid){
		parent::update('user', $uid, array('group_id'=>$gid));
	}

	// function getGroupDetails($id) {
	// 	if(isset($_SESSION['group']) && !empty($_SESSION['group'])) {
	// 		if(array_key_exists($id, $_SESSION['group'])) {
	// 			return $_SESSION['group'][$id];
	// 		}
	// 	}
	// 	return array();
	// }

	function getGroupDetails($gid){
        return parent::read('group',$gid);
	}
	function getAllUsersFromGroup($group_id){
		//return parent::read('group',$uid);
	}



	function setGroupName($gid , $new_name){
		parent::update('group', $gid, array('name'=>$new_name));
	}
	function getGroupName($gid){
		return parent::read('group',$gid)['name'];
	}



}


?>
