<?php 

class Group extends Crud {
	//Constructor function for class group.
	function __construct(){
		parent::__construct('group');
	}
	/*
	* @params : gid= Group Id , uid = User Id
	* Update user object , add groupID (Map user with group?)
	*/
	function setUserGroup($gid, $uid){
		parent::update('user', $uid, array('group_id'=>$gid));
	}
	/*
	* Return the group details based on the group ID.
	*/
	function getGroupDetails($gid){
        return parent::read('group',$gid);
	}
	/*
	* Return the all the users from a specified group ID.
	*/
	function getAllUsersFromGroup($gid){

		$users = User::getAllUsers();
			$users_in_group = array();
		foreach ($users as $user) {
			if (isset($user['group_id']) && ($user['group_id'] == $gid)){
				$users_in_group[] = $user;
			}
		}
		return $users_in_group;
	}
	/*
	* Update group's name by a specified string
	*/
	function setGroupName($gid , $new_name){
		parent::update('group', $gid, array('name'=>$new_name));
	}
	/*
	* Return the group's name based on the group id.
	*/
	function getGroupName($gid){
		return parent::read('group',$gid)['name'];
	}
	/*
	* Return all the group objects stored in the current SESSION.
	*/
	function getAllGroups(){
		return $_SESSION['group'];
	}
	function insert_group_into_db($array,$table = 'groups'){
		return parent::create_db_empty_object($array,$table);
	}
}

?>
