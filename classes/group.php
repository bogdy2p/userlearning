<?php 

class Group extends Crud {



	function __construct(){
		parent::__construct('group');
	}
	public function Create($array) {
        //$this->new($array);
    }
    public function Read($array) {
        return NULL;
    }
    public function Update($array) {
        return NULL;
    }
    public function Delete($array) {
        return NULL;
    }

	function setUserGroup($user_id, $group_id){
		
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
