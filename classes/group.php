<?php 

class Group extends Crud {
	//Constructor function for class group.
	function __construct(){
		parent::__construct('group');
	}
	//GROUP CREATE
	function create($array,$table = 'groups'){
		return parent::create($array,$table);
	}
	//GROUP READ
	function list_all_groups($table_name = 'groups'){
		$statement = parent::read($table_name);
					echo '<table class="default_css_table">';
					echo '<th>ID</th>';
					echo '<th>Group Name</th>';
					echo '<th>Special Key</th>';
		foreach ($statement as $row) {
                     echo '<tr>';
                     echo '<td>'. $row['id'] . '</td>';
					 echo '<td>'. $row['name'] . '</td>';
					 echo '<td>'. $row['special_key'] . '</td>';
                     echo '</tr>';
           }
           			echo '</table>';
	}
	//GROUP UPDATE
	function update($id, $table = 'groups', $update_params_array){
		return parent::update($id, $table, $update_params_array);
	}
	//GROUP DELETE
	function delete($id, $table = 'groups'){
		return parent::delete($id, $table);
	}
	function grab_all_group_ids($table_name ='groups') {
		$statement = parent::grab_all_ids($table_name);
		$return = array();
		foreach ($statement as $row) {
				$return[] = $row['id'];
		}
		return $return;
	}

	function list_groupdata_by_id($id, $table_name= 'groups'){
		$statement = parent::read_by_id($id,$table_name);
		foreach ($statement as $row){
			echo '<table class="default_css_table">';
				
				echo '<th>ID</th>';
				echo '<th>Name</th>';
				echo '<th>Special Key</th>';
				echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
				echo '<td>'. $row['name'] . '</td>';
				echo '<td>'. $row['special_key'] . '</td>';
                echo '</tr>';
            echo '</table>';
        }
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////DEPRECATED FUNCTIONS FOR WHEN IT WAS WITH SESSION//////////////////////////
//////////////////////////////SHOULD BE ALL IMPLEMENTED WITH THE DB//////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////

	// function setUserGroup($gid, $uid){
	// 	parent::update('user', $uid, array('group_id'=>$gid));
	// }
	/*
	* Return the group details based on the group ID.
	*/
	// function getGroupDetails($gid){
 //        return parent::read('group',$gid);
	// }
	/*
	* Return the all the users from a specified group ID.
	*/
	// function getAllUsersFromGroup($gid){

	// 	$users = User::getAllUsers();
	// 		$users_in_group = array();
	// 	foreach ($users as $user) {
	// 		if (isset($user['group_id']) && ($user['group_id'] == $gid)){
	// 			$users_in_group[] = $user;
	// 		}
	// 	}
	// 	return $users_in_group;
	// }
	/*
	* Update group's name by a specified string
	*/
	// function setGroupName($gid , $new_name){
	// 	parent::update('group', $gid, array('name'=>$new_name));
	// }
	/*
	* Return the group's name based on the group id.
	*/
	// function getGroupName($gid){
	// 	return parent::read('group',$gid)['name'];
	// }
	/*
	* Return all the group objects stored in the current SESSION.
	*/
	// function getAllGroups(){
	// 	return $_SESSION['group'];
	// }


}

?>
