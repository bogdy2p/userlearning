<?php 

class User extends Crud {

	function __construct(){
		parent::__construct('user');
	}
	function __destruct(){
		parent::__destruct('user');
	}

	public function create($array) {
		$this->uid = NULL;//$array['id'];
		$this->username = NULL;//$array['username'];
		$this->password = NULL;//$array['password'];
		$this->details = NULL;//$array['details'];
		$this->group = NULL;
    }
    public function read($array) {
    	return $this->obj;
    }
    public function update($array) {
    	$this->uid = $array['uid'];
		$this->username = $array['username'];
		$this->password = $array['password'];
		$this->details = $array['details'];
		$this->group = $array['group'];	
    }
    public function delete($array) {
    	$this->__destruct();
    }

	function setUsername($username, $id = NULL){
		$this->username = $username;
	}

	function setPassword($password, $id = NULL){
		$this->password = $password;
	}

	function setDetails($details, $id = NULL){
		$this->details = $details;
	}

	function getUsername(){
		return $this->username;
	}
	function getUserPassword(){
		return $this->password;
	}
	function getUserDetails(){
		return $this->details;
	}
	function getUserData(){
		$user['username'] = $this->getUsername($id);
		$user['password'] = $this->getUserPassword($id);
		$user['details'] = $this->getUserDetails($id);
		$user['group'] = $this->getUserGroup($id);
		return $user;
	}
	function getUserGroup($id){
		return $this->group;
	}
}





































?>
