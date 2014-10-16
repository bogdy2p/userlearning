<?php 

class User extends Crud {
	//Constructor function for class user.
	function __construct(){
		parent::__construct('user');
	}
	

	function verify_user_existence($id, $username){
		return parent::verify_existence($id,$username);
	}

	function verify_user_exists($object_id, $table_name){
		return parent::verify_object_exists($object_id,$table_name);
	}

	function create($array,$table = 'users'){
		return parent::create($array,$table);
	}

	function user_db_update($id, $table = 'users', $update_params_array){
		return parent::db_update($id, $table, $update_params_array);
	}
	function user_db_delete($id, $table = 'users'){
		return parent::db_delete($id, $table);
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////DEPRECATED FUNCTIONS FOR WHEN IT WAS WITH SESSION//////////////////////////
//////////////////////////////SHOULD BE ALL IMPLEMENTED WITH THE DB//////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	/*
	* Alter parent function Crud::create.??
	*/
	// public function create($array) {
	// 	if(isset($array['password']) && !empty($array['password'])) {
	// 		$tempPass = $array['password'];
	// 		unset($array['password']);
	// 		$array['password'] = md5($tempPass);
	// 	}
	// 	parent::create($array);
 //    }
    
	/*
	* Update / add username to a specified user object (by id);
	*/
 // 	function setUsername($uid , $username){
	// 	parent::update('user', $uid, array('username'=>$username));
	// }
	/*
	* Update / add password to a specified user object (by id);
	*/
	// function setPassword($uid, $password){
	// 	parent::update('user', $uid, array('password'=>md5($password)));
	// }
	/*
	* Update / add details to a specified user object (by id);
	*/
	// function setDetails($uid, $details){
	// 	parent::update('user', $uid, array('details'=>$details));
	// }
	/*
	* Return a specified user's username.
	*/
	// function getUsername($uid){
	// 	return parent::read('user',$uid)['username'];
	// }
	/*
	* Return a specified user's password.
	* //DEPRECATED
	*/
	// function getUserPassword($uid){
	// 	return parent::read('user',$uid)['password'];
	// }
	/*
	* Return a specified user's details.
	* //DEPRECATED
	*/
	// function getUserDetails($uid){
	// 	return parent::read('user',$uid)['details'];
	// }
	/*
	* Return all the data of a specified user (returns the user object...)
	* //DEPRECATED
	*/
	// function getUserData($uid){
	// 	return parent::read('user',$uid);
	// }
	 /*
	* Return the group of a specified user (by the user id).
	* //DEPRECATED
	*/
	// function getUserGroup($uid){
	// 	return parent::read('user',$uid)['group_id'];
	// }
	/*
	* Return all the user objects stored in the current SESSION.
	* //DEPRECATED
	*/
	// function getAllUsers() {
	// 	return $_SESSION['user'];
	// }

}

?>