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
	function getAllUsersFromGroup($gid){

		$users = User::getAllUsers();
			$users_in_group = array();
		foreach ($users as $user) {
			if (isset($user['group_id']) && ($user['group_id'] == $gid)){
				$users_in_group[] = $user;
			}

			//$users_in_group['id'][] = $user['id'];
			//$users_in_group['Uname'][] = $user['username'];
			//$users_in_group['pass'][] = $user['password'];

		}
		// for each user in system , if user[group_id ] = $gid , users array[] = user['username']


		//return parent::read('group',$uid);
		//$users = parent::read('user')
		return $users_in_group;

	}



	function setGroupName($gid , $new_name){
		parent::update('group', $gid, array('name'=>$new_name));
	}
	function getGroupName($gid){
		return parent::read('group',$gid)['name'];
	}
	function getAllGroups(){
		return $_SESSION['group'];
	}


}


?>
