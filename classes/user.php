<?php 

class User extends Crud {
	//Constructor function for class user.
	function __construct(){
		parent::__construct('user');
	}
	//USER CREATE
	function create($array,$table = 'users'){
		return parent::create($array,$table);
	}
	//USER READ
	function list_all_users($table_name = 'users'){
		$statement = parent::read($table_name);
					echo '<table class="default_css_table">';
					echo '<th>ID</th>';
					echo '<th>Username</th>';
					echo '<th>Password</th>';
					echo '<th>Details</th>';
					echo '<th>Group Id</th>';
		foreach ($statement as $row) {
                     echo '<tr>';
                     echo '<td>'. $row['id'] . '</td>';
					 echo '<td>'. $row['username'] . '</td>';
					 echo '<td>'. $row['password'] . '</td>';
					 echo '<td>'. $row['details'] . '</td>';
					 echo '<td>'. $row['group_id'] . '</td>';	
                     echo '</tr>';
           }
           			echo '</table>';
	}
	function grab_all_user_ids($table_name ='users') {
		$statement = parent::grab_all_ids($table_name);
		$return = array();
		foreach ($statement as $row) {
				$return[] = $row['id'];
		}
		return $return;
	}
	function list_userdata_by_id($id, $table_name= 'users'){
		$statement = parent::read_by_id($id,$table_name);
		foreach ($statement as $row){
			echo '<table class="default_css_table">';
				
				echo '<th>ID</th>';
				echo '<th>Username</th>';
				echo '<th>Password</th>';
				echo '<th>Details</th>';
				echo '<th>Group Id</th>';
				echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
				echo '<td>'. $row['username'] . '</td>';
				echo '<td>'. $row['password'] . '</td>';
				echo '<td>'. $row['details'] . '</td>';
				echo '<td>'. $row['group_id'] . '</td>';	
                echo '</tr>';
            echo '</table>';
        }
	}

	//USER UPDATE
	function update($id, $table = 'users', $update_params_array){
		return parent::update($id, $table, $update_params_array);
	}
	//USER DELETE
	function delete($id, $table = 'users'){
		return parent::delete($id, $table);
	}
	function verify_user_existence($id, $username){
		return parent::verify_existence($id,$username);
	}
	function verify_user_exists($object_id, $table_name){
		return parent::verify_object_exists($object_id,$table_name);
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////DEPRECATED FUNCTIONS FOR WHEN IT WAS WITH SESSION//////////////////////////
//////////////////////////////SHOULD BE ALL IMPLEMENTED WITH THE DB//////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	/* Return a specified user's username.
	*/
	// function getUsername($uid){
	// 	return parent::read('user',$uid)['username'];
	// }
	/*


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