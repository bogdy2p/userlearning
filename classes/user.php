<?php 

class User extends Crud {

	function __construct(){
		parent::__construct('user');
	}

	public function create($array) {
		if(isset($array['password']) && !empty($array['password'])) {
			$tempPass = $array['password'];
			unset($array['password']);
			$array['password'] = md5($tempPass);
		}
		parent::create($array);
    }
 	function setUsername($uid , $username){
		parent::update('user', $uid, array('username'=>$username));
	}
	function setPassword($uid, $password){
		parent::update('user', $uid, array('password'=>md5($password)));
	}
	function setDetails($uid, $details){
		parent::update('user', $uid, array('details'=>$details));
	}
	function getUsername($uid){
		return parent::read('user',$uid)['username'];
	}
	function getUserPassword($uid){
		return parent::read('user',$uid)['password'];
	}
	function getUserDetails($uid){
		return parent::read('user',$uid)['details'];
	}
	function getUserData($uid){
		return parent::read('user',$uid);
	}
	function getUserGroup($uid){
		return parent::read('user',$uid)['group_id'];
	}

	function getAllUsers() {
		return $_SESSION['user'];
	}
	
}

?>