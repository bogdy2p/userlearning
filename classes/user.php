<?php 

class User extends Crud {

	function __construct(){
		parent::__construct('user');
	}
	function __destruct(){
		parent::__destruct('user');
	}

	public function Create($array) {
		$this->id = $array['id'];
		$this->username = $array['username'];
		$this->password = $array['password'];
		$this->details = $array['details'];
    }
    public function Read($array) {
    	return $this->obj;
        //return NULL;
    }
    public function Update($array) {

        //return NULL;
    }
    public function Delete($array) {
    	$this->__destruct();
    }

	function setUsername($id, $username){
		$this->username = $username;
	}

	function setPassword($id, $password){
		$this->password = $password;
	}

	function setDetails($id, $details){
		$this->details = $details;
	}

	function getUsername($id){
		return $obj[$id]->username;
	}

	function getUserPassword($id){
		return $obj[$id]->password;
	}
	function getUserDetails($id){
		return $obj[$id]->details;
	}

	function getUserData($id){

		$user['username'] = getUsername($id);
		$user['password'] = getUserPassword($id);
		$user['details'] = getUserDetails($id);
		$user['group'] = getUserGroup($id);
		return $user;
		//will return an array of the user's data
	}
	function getUserGroup($id){
		return $obj[$id]->group;
	}
}





































?>
