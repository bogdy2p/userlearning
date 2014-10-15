<?php 

class Group extends Crud {

	function __construct(){
		parent::__construct('group');
	}
	function __destruct(){
		parent::__destruct('group');
	}
	
	public function create($array) {
        //$this->
    }
    public function read($array) {
        return NULL;
    }
    public function update($array) {
        return NULL;
    }
    public function delete($array) {
        return NULL;
    }

	function setUserGroup($user_id, $group_id){
		// if ($this->uid == $user_id){
		// $this->group = $group_id;
		// } 
	}
	function getUserGroups($user_id){
        //
	}
	function getAllUsersFromGroup($group_id){

	}
	function setGroupName($group_id){

	}
	function getGroupName($group_id){

	}



}


?>
