<?php

require_once 'database.php';
require_once('function_call_log.php');

abstract class Crud {

	public $obj = '';
	private $id = 0;
	private $db;

	public function __construct($obj){
		$this->db = new Database();
		$this->db = $this->db->dbConnect();
		$this->obj = $obj;
	}
	/**
		*********************************************************************
		*********************************************************************
		********************** GENERAL TABLE FUNCTIONS **********************
		********************* ? APPLY TO EVERY TABLE ?  *********************
		*********************************************************************
		*********************************************************************
	*/
	/// Add an empty row to the database specified table (only with the id of the object)

	
	
	function update($id, $table, $update_params_array){
		$exists = Crud::verify_object_exists($id,$table);
		if(($exists) && (!empty($update_params_array))) {

				if ($table == 'users'){
							$statement = $this->db->prepare("UPDATE users SET name=?, password=? WHERE id=?");
							$statement->bindParam(1, $update_params_array['name']);
							$statement->bindParam(2, $update_params_array['password']);
							$statement->bindParam(3, $id);
							// //LOG
							// 	$log_message = 'Updated user '.$id;
							// 	$log = new Log();
							// 	$log->create_log('crud.php |'.__FUNCTION__,$log_message);
							// //END LOG
									  }
				elseif ($table == 'groups'){

				$statement = $this->db->prepare("UPDATE groups SET id=?, name=?, special_key=? WHERE id=? ");
				$statement->bindParam(1, $update_params_array['id']);
				$statement->bindParam(2, $update_params_array['name']);
				$statement->bindParam(3, $update_params_array['special_key']);
				$statement->bindParam(4, $id);
					// //LOG
					// 			$log_message = 'Updated group '.$id;
					// 			$log = new Log();
					// 			$log->create_log('crud.php |'.__FUNCTION__,$log_message);
					// //END LOG
					}
			$statement->execute();
		}else{
			echo("Object id {$id} doesnt exist in db , table is incorrect , or params array is empty <br />");
		}
	 }

	 function delete($id,$table) {
	 	
	 	$exists = Crud::verify_object_exists($id,$table);
	 	 	if($exists){
	 		$statement = $this->db->prepare("DELETE FROM user_groups." . $table . " WHERE ".$table.".id=?");
	 		$statement->bindParam(1, $id);
	 		$statement->execute();
	 	// 	//LOG
			// 	$log_message = 'Deleted object with id '.$id.' From table '.$table;
			// 	$log = new Log();
			// 	$log->create_log('crud.php |'.__FUNCTION__,$log_message);
			// //END LOG
	 	 	}else{
	 		//print_r("There is no such entry in the whole database. Nothing to delete.");
	 	}
	 }

	 //Function takes parameters : id of the object , name of the table.
	//Function that returns true if there already is an object with that id in the table , or false.
	function verify_object_exists($object_id,$table_name){
		if(!empty($object_id) && !empty($table_name)){
			$statement = $this->db->prepare("SELECT * FROM ". $table_name . " WHERE id=?");
			$statement->bindParam(1, $object_id);
			$statement->execute();
			if($statement->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
		}else{
			echo("Parameters error | @verify_object_exists <br />");
		}
	}

	//Verify that a name exists in the name column of each table.
	function verify_name_exists_in_table($name,$table_name){
		$statement = $this->db->prepare("SELECT name FROM ". $table_name . " WHERE name=?");
		$statement->bindParam(1,$name);
		$statement->execute();
		//print_r($statement);
		if($statement->rowCount() >= 1){
			return true;
		}else{
			return false;
		}
	}
	
	function read($table_name){
	 	$statement = $this->db->prepare("SELECT * FROM ". $table_name);
	 	$statement->execute();
	 	return $statement;
	 }

	function grab_by_id($id, $table_name){
		$statement = $this->db->prepare("SELECT * FROM ". $table_name ." WHERE id=?");
		$statement->bindParam(1,$id);
		$statement->execute();
		return $statement;
	}

	function grab_all_ids($table_name){
		$statement = $this->db->prepare("SELECT id FROM ". $table_name);
		$statement->execute();
		return $statement;
	}

	function get_name_by_id($id,$table_name){
		$statement = $this->db->prepare("SELECT name FROM ".$table_name. " WHERE id=?");
		$statement->bindParam(1,$id);
		$statement->execute();
		foreach ($statement as $row) {
			return $row['name'];
		}
	}

	function print_error_midscreen($error){
	    if(isset($error)){
		    $received_error = $error;
		    echo '<br />';
		    echo '<div class="row">';
		    echo '<div class="col-xs-12 col-md-4"></div>';
		    echo '<div class="col-xs-12 col-md-4">'.$received_error.'</div>';
		    echo '<div class="col-xs-12 col-md-4"></div>';
		    echo '</div>';
	  	}
	}



	/* END OF GENERAL TABLE FUNCTIONS */





	 /**
		*********************************************************************
		*********************************************************************
		*********************** USERS TABLE FUNCTIONS ***********************
		********************** Related to USERS table ***********************
		*********************************************************************
		*********************************************************************
	*/


	function verify_existence($uid, $name){
		if(!empty($uid) && !empty($name)){
			$st = $this->db->prepare("select * from users where id=? and name=?");
			$st->bindParam(1, $uid);
			$st->bindParam(2, $name);
			$st->execute();
			if($st->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
		}else{
			die("ERR : userid and/or password empty");
		}
	}
	
	/* END OF USERS TABLE FUNCTIONS */



	/**
		*********************************************************************
		*********************************************************************
		********************* MAPPING TABLE FUNCTIONS ***********************
		******************* Related to USERGROUPS table *********************
		*********************************************************************
		*********************************************************************
	*/


	function assign_user_to_group($user_id,$group_id){
		$mapping_exists = Crud::verify_existing_mapping($user_id,$group_id);
		if(!$mapping_exists){
			Crud::map_user_group($user_id,$group_id);
		}else{
			$username = Crud::get_name_by_id($user_id,'users');
			$groupname = Crud::get_name_by_id($user_id,'groups');
			die("'".$username."' is already into the '" .$groupname. "' Group!");
		}
	}

	function map_user_group($uid,$gid){
		$statement = $this->db->prepare("INSERT INTO usergroups (user_id,group_id) VALUES ('$uid','$gid')");
		$statement->execute();
		// //LOGGING OF THE ACTION !
		// 		$log_message = 'Mapped user : '.$uid.' to group : '.$gid;
		// 		$log = new Log();
		// 		$log->create_log('crud.php | '.__FUNCTION__,$log_message);
		// print_r("Mapped user {$uid} to group {$gid}. ");
		return $statement;
	}

	function verify_existing_mapping($uid,$gid){
		$statement = $this->db->prepare("SELECT * FROM usergroups WHERE user_id=? AND group_id=?");
		$statement->bindParam(1, $uid);
		$statement->bindParam(2, $gid);
		$statement->execute();
		if($statement->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
	}

	function get_mapping_table_data(){
		$statement = $this->db->prepare("SELECT * FROM usergroups");
		$statement->execute();
		return $statement;
	}

	

	function delete_mapping($id,$type){
		$statement = $this->db->prepare("DELETE FROM usergroups WHERE {$type} = ?");
		$statement->bindParam(1,$id);
		$statement->execute();
		return $statement;
	}

	function delete_map_by_id($id){
		$statement = $this->db->prepare("DELETE FROM usergroups WHERE id = ?");
		$statement->bindParam(1,$id);
		$statement->execute();
		return $statement;
	}

	function get_number_of_groups_for_a_user($id){
		$statement = $this->db->prepare("SELECT group_id FROM usergroups WHERE user_id = ?");
		$statement->bindParam(1,$id);
		$statement->execute();
		$groups_array = array();
		foreach ($statement as $group) {
			$groups_array[] = Crud::get_name_by_id($group['group_id'],'groups');

		}
		return $groups_array;
	}

	function get_usernames_for_a_group($id){
		$statement = $this->db->prepare("SELECT user_id FROM usergroups WHERE group_id = ?");
		$statement->bindParam(1,$id);
		$statement->execute();
		$users_array = array();
		foreach ($statement as $user) {
			$users_array[] = Crud::get_name_by_id($user['user_id'],'users');
		}
		return $users_array;
	}
	function get_userids_for_a_group($id){
		$statement = $this->db->prepare("SELECT user_id FROM usergroups WHERE group_id = ?");
		$statement->bindParam(1,$id);
		$statement->execute();
		$users_array = array();
		foreach ($statement as $user) {
			$users_array[] = $user['user_id'];
		}
		return $users_array;
	}

	function delete_all_mapping_for_user($user_id){
			$statement = $this->db->prepare("DELETE FROM user_groups.usergroups WHERE usergroups.user_id = ?");
			$statement->bindParam(1,$user_id);
			$statement->execute();
			// //LOGGING OF THE ACTION !
			// 	$log_message = 'Deleted all mapping for id : '.$user_id;
			// 	$log = new Log();
			// 	$log->create_log('crud.php | '.__FUNCTION__,$log_message);
			return $statement;
		}

	/* END OF MAPPING TABLE FUNCTIONS */





	/**
		*********************************************************************
		*********************************************************************
		******************* USER_DETAILS TABLE FUNCTIONS ********************
		****************** Related to USER_DETAILS table ********************
		*********************************************************************
		*********************************************************************
	*/
	


	// function verify_pair_user_id_detail_type_exists($user_id,$detail_type,$detail){
	// 	$statement = $this->db->prepare("SELECT user_id,detail_type,detail FROM user_details WHERE detail = ?");
	// }

	function update_user_details_for_user($user_id,$detail_type,$new_detail){
		$statement = $this->db->prepare("UPDATE user_groups.user_details SET detail = ? WHERE user_details.user_id = ? AND user_details.detail_type = ?");
		$statement->bindParam(1,$new_detail);
		$statement->bindParam(2,$user_id);
		$statement->bindParam(3,$detail_type);
		$statement->execute();
		print_r($statement);
		return $statement;
	}



	function grab_detail_value_by_type_and_id($id,$type){
		$statement = $this->db->prepare("SELECT detail FROM user_details WHERE user_id = ? AND detail_type = ?");
		$statement->bindParam(1,$id);
		$statement->bindParam(2,$type);
		$statement->execute();
		foreach ($statement as $row) {
			return ($row['detail']);
		}
	}

	function check_detail_exists($user_id,$detail){
		$statement = $this->db->prepare("SELECT id FROM user_details WHERE detail = ? AND user_id = ?");
		$statement->bindParam(1,$detail);
		$statement->bindParam(2,$user_id);
		$statement->execute();
		if($statement->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
	}


	function check_detail_pair_exists($user_id,$detail_type){
		$statement = $this->db->prepare("SELECT id FROM user_details WHERE detail_type = ? AND user_id = ?");
		$statement->bindParam(1,$detail_type);
		$statement->bindParam(2,$user_id);
		$statement->execute();
		if($statement->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
	}



	//Returns an array of the already set detail types disponible for the specified user.
	function get_detail_types_set_for_user($user_id){
		$statement = $this->db->prepare("SELECT detail_type FROM user_details WHERE user_id = ?");
		$statement->bindParam(1,$user_id);
		$statement->execute();
		$return = array();
		foreach ($statement as $row) {
			$return[] = $row['detail_type'];
		}
		return $return;

	}
	
	//This function should get 3 parameters : the user id , the detail type , and the detail value
	//It should return a BOOLEAN value if there exists a detail value for the user id 	//, and if that row also has the specified detail type
	// (this was problematic)
	function check_detail_exists_of_type($user_id,$detail_type,$detail){
		$exists = Crud::check_detail_exists($user_id,$detail);
		if($exists){
			$already_set_details = Crud::get_detail_types_set_for_user($user_id);
			if(in_array($detail_type, $already_set_details)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}




	function get_all_user_details(){
		$statement = $this->db->prepare("SELECT * FROM user_details");
		$statement->execute();
		$return = array();
		foreach ($statement as $detail) {
			$return[] = $detail['detail'];
		}
		return $return;
	}

	function add_user_detail_with_type($user_id,$detail_type,$detail){
		$detail_exists = Crud::check_detail_exists_of_type($user_id,$detail_type,$detail);
		$detail_type_exists = Crud::check_detail_type_exists($detail_type);

		if((!$detail_exists) && (!(is_null($detail))) && ($detail != ' ') && ($detail != '')){
			if($detail_type_exists){
				$statement = $this->db->prepare("INSERT INTO user_details (user_id,detail_type,detail) VALUES ('$user_id','$detail_type','$detail')");
				$statement->execute();
				// //LOGGING OF THE ACTION !
				// 	$log_message = 'Function accessed';
				// 	$log = new Log();
				// 	$log->create_log('crud.php | '.__FUNCTION__,$log_message);
				return $statement;
			}else{
				echo "You cannot enter a detail which hasn't been predefined in the db";
			}
		}else{
			//echo "Unable to add {$detail} : This detail already exists for this user / Is null !";
		}
	}

	function get_user_details_array($user_id) {
		$statement = $this->db->prepare("SELECT id FROM user_details WHERE user_id = ?");
		$statement->bindParam(1,$user_id);
		$statement->execute();
		$user_details_array = array();
		foreach ($statement as $detail) {
			$user_details_array[] = $detail['id'];
		}
		return $user_details_array;
	}
	
	function get_detail_data_by_detail_id($detail_id) {
		$statement = $this->db->prepare("SELECT detail,detail_type FROM user_details WHERE id = ?");
		$statement->bindParam(1,$detail_id);
		$statement->execute();
		$return = array();
		foreach ($statement as $row) {
			$return['type'] = $row['detail_type'];
			$return['value'] = $row['detail'];
		}
		return $return;
	}	

	function get_detail_value_by_detail_id($detail_id) {
		$statement = $this->db->prepare("SELECT detail FROM user_details WHERE id = ?");
		$statement->bindParam(1,$detail_id);
		$statement->execute();
		foreach ($statement as $row) {
			return $row['detail'];
		}
	}

	function delete_user_details_for_this_user($user_id){
		$statement = $this->db->prepare("DELETE FROM user_groups.user_details WHERE user_details.user_id = ? ");
		$statement->bindParam(1,$user_id);
		$statement->execute();
		// //LOGGING OF THE ACTION !
		// 		$log_message = 'Deleted all user_details for id : '.$user_id;
		// 		$log = new Log();
		// 		$log->create_log('crud.php | '.__FUNCTION__,$log_message);
		return $statement;
	}

	function delete_user_details_for_deleted_type($deleted_type){
		$statement = $this->db->prepare("DELETE FROM user_groups.user_details WHERE user_details.detail_type = ? ");
		$statement->bindParam(1,$deleted_type);
		$statement->execute();
			// //LOGGING OF THE ACTION !
			// 	$log_message = 'Deleted all mapping for detail type : '.$deleted_type;
			// 	$log = new Log();
			// 	$log->create_log('crud.php | '.__FUNCTION__,$log_message);
		return $statement;
	}
	/* END OF USER_DETAILS TABLE FUNCTIONS */


	/**
		*********************************************************************
		*********************************************************************
		***************** USER_DETAIL_TYPES TABLE FUNCTIONS *****************
		**************** Related to USER_DETAIL_TYPES table *****************
		*********************************************************************
	*/
	function get_all_user_detail_types() {
		$statement = $this->db->prepare("SELECT * FROM user_detail_types");
		$statement->execute();
		$detail_types_array = array();
		foreach ($statement as $row) {
			$detail_types_array[] = $row['name'];
		}
		return $detail_types_array;
	}

	function get_all_user_detail_types_full_tabledata() {
		$statement = $this->db->prepare("SELECT * FROM user_detail_types");
		$statement->execute();
		$detail_types_array = array();
		foreach ($statement as $row) {
			$detail_types_array[] = $row;
		}
		return $detail_types_array;
	}

	function get_detail_type_by_name($name){
		$statement = $this->db->prepare("SELECT * FROM user_detail_types WHERE name = ?");
		$statement->bindParam(1,$name);
		$statement->execute();
		//RETURN THE OBJECT MOMENTARELY.
		$detail = array();
		foreach ($statement as $row) {
		 	$detail['id'] = $row['id'];
			$detail['name'] = $row['name'];
		}
		return $detail;
	}

	function check_detail_type_exists($user_detail_type) {
		$statement = $this->db->prepare("SELECT id FROM user_detail_types WHERE name = ?");
		$statement->bindParam(1,$user_detail_type);
		$statement->execute();
		if($statement->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
	}

	function add_user_detail_type($user_detail_type) {
		$detail_type_exists = Crud::check_detail_type_exists($user_detail_type);
		if((!$detail_type_exists) && (!is_null($user_detail_type)) && ($user_detail_type != ' ')){
			$statement = $this->db->prepare("INSERT INTO user_detail_types (id,name) VALUES ('','$user_detail_type')");
			$statement->execute();
			// //LOGGING OF THE ACTION !
			// 	$log_message = 'Added new detail type. '.$user_detail_type.' to user_detail_types table.';
			// 	$log = new Log();
			// 	$log->create_log('crud.php |'.__FUNCTION__,$log_message);
			return $statement;
		}
		else{
			echo "Unable to add {$user_detail_type} as a detail type : This detail type already exists for this user / Is null !";
		}
	}

	function get_detail_type_id_by_name($name){
		$statement = $this->db->prepare("SELECT id FROM user_detail_types WHERE name = ?");
		$statement->bindParam(1,$name);
		$statement->execute();
		foreach ($statement as $row) {
			return $row['id'];
		}
	}

	function update_detail_type_name($old_name,$new_name){
		//Grab the id by the old name
		$the_id = Crud::get_detail_type_id_by_name($old_name);
		$statement = $this->db->prepare("UPDATE user_groups.user_detail_types SET name = ? WHERE user_detail_types.id =?");
		$statement->bindParam(1,$new_name);
		$statement->bindParam(2,$the_id);
		$statement->execute();
		return $statement;
	}

	function update_detail_types_names_in_user_groups($old_name,$new_name){
		$statement = $this->db->prepare("UPDATE user_groups.user_details SET detail_type = ? WHERE user_details.detail_type =?");
		$statement->bindParam(1,$new_name);
		$statement->bindParam(2,$old_name);
		$statement->execute();
		// //LOGGING OF THE ACTION !
		// 	$log_message = 'Updated all details named '.$old_name.' Renamed them to '.$new_name;
		// 	$log = new Log();
		// 	$log->create_log('crud.php |'.__FUNCTION__,$log_message);
		return $statement;
	}

	function delete_detail_type($user_detail_type) {
		$detail_type_exists = Crud::check_detail_type_exists($user_detail_type);
		if($detail_type_exists){
			$statement = $this->db->prepare("DELETE FROM user_groups.user_detail_types WHERE user_detail_types.name = ?");
			$statement->bindParam(1,$user_detail_type);
			$statement->execute();
			// //LOGGING OF THE ACTION !
			// 	$log_message = 'Deleted detail '.$user_detail_type.' from user_detail_types table.';
			// 	$log = new Log();
			// 	$log->create_log('crud.php |'.__FUNCTION__,$log_message);
			return $statement;
		}
	}
	/* END OF USER_DETAIL_TYPES TABLE FUNCTIONS */

/*
00000000000000....000000000000.........000000.......000.........000..00000000000........0000...........
00000000000000....0000000000000.......000..000......000.........000..000000000000.....000000000........
000...............000.........00.....00......00.....000.........000..000.......000..0000......000......
000...............000.........00....00........00....000.........000..000.......000..0000........0......
000...............000........00....00..........00...000.........000..000......000.....0000.............
00000000000000....000000000000....00............00..000.........000..000000000000........000...........
00000000000000....000000000.......00............00..000.........000..000000000.............0000........
000........000....000....000......00............00..000.........000..000....................0000.......
000........000....000.....000......00..........00...000.........000..000.....................0000......
000........000....000......000......00........00.....000.......000...000........................0000...
000........000....000.......000......00......00.......000.....000....000.............0........00000....
00000000000000....000........000......000..000.........000000000.....000.............00...00000000.....
00000000000000....000........000.......000000............00000.......000.............0000000000........




	/**
		*********************************************************************
		*********************************************************************
		********************** GROUPS TABLE FUNCTIONS **********************
		********************* Related to GROUPS table ***********************
		*********************************************************************
	*/
		function get_all_groups_in_db() {
		$statement = $this->db->prepare("SELECT * FROM groups");
		$statement->execute();
		$groups_array = array();
		foreach ($statement as $row) {
			$groups_array['id'][] = $row['id'];
			$groups_array['name'][] = $row['name'];
		}
		return $groups_array;
	}
		function get_all_groups_for_user($user_id) {
		$group_ids_array = Crud::get_number_of_groups_for_a_user($user_id);
		return $group_ids_array;
		}

		
		function get_groupid_by_groupname($groupname){
			$statement = $this->db->prepare("SELECT id FROM groups WHERE name = ?");
			$statement->bindParam(1,$groupname);
			$statement->execute();
			foreach ($statement as $row) {
				return $row['id'];
			}
		}




	/* END OF GROUPS TABLE FUNCTIONS */	

	//SPECIAL REDIRECT FUNCTION

	function redirect($url_string) {
    if (!headers_sent())
        header('Location: '.$url_string);
    else {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url_string.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url_string.'" />';
        echo '</noscript>';
    }
}




/*******************************************************************************************************************
***********TTTTTTTTTTT****EEEEEEEEEEEE**MMM*******MM***PPPPPPPPP***LLL*************AA******TTTTTTTTTTT**EEEEEEEEEEEE
/**************TTTT*******EEEEEEE*******MMMM**M**MMM***PPP****PPP**LLL************AAAA*********TTTT*****EEEEEEE*****
/**************TTTT*******EEEE**********MMMMMMMMMMMM***PPP****PPP**LLL***********AA**AA********TTTT*****EEEE********
/**************TTTT*******EEEE**********MM***MMM**MM***PPPPPPPPP***LLL**********AA****AA*******TTTT*****EEEE********
/**************TTTT*******EEEE**********MM********MM***PPPPPPPP****LLL*********AA******AA******TTTT*****EEEE********
/**************TTTT*******EEEEEEEEEEEE**MM********MM***PPP*********LLL********AAAAAAAAAAAA*****TTTT*****EEEEEEEEEEEE
/**************TTTT*******EEEE**********MM********MM***PPP*********LLL********AA********AA*****TTTT*****EEEE********
/**************TTTT*******EEEE**********MM********MM***PPP*********LLL********AA********AA*****TTTT*****EEEE********
/**************TTTT*******EEEE**********MM********MM***PPP*********LLL********AA********AA*****TTTT*****EEEE********
/**************TTTT*******EEEEEEEE******MM********MM***PPP*********LLLLLLLLL**AA********AA*****TTTT*****EEEEEEEE****
/**************TTTT*******EEEEEEEEEEEE**MM********MM***PPP*********LLLLLLLLL**AA********AA*****TTTT*****EEEEEEEEEEEE
/*******************************************************************************************************************/


function include_page_header_content() {
	// INCLUDE CSS FILES
 	echo '<meta charset="utf-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/style.css">';
    echo '<link href="../assets/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">';
    echo '<script src="../assets/testuser.js"></script>';
    echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';

}

function include_page_header_content_index() {
	// INCLUDE CSS FILES
 	echo '<meta charset="utf-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" type="text/css" href="assets/css/style.css">';
    echo '<link href="assets/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">';
    echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
    
}


function include_page_footer_content(){
	echo '<!-- jQuery (necessary for Bootstrap JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>';
}
function include_page_footer_content_index(){
	echo '<!-- jQuery (necessary for Bootstrap JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>';
}

function print_sitewide_menu(){
    echo'   
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>        
                            <a class="navbar-brand" href="/user">Home</a>
                    </div>                            
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                             <li><a href="/user/views/view_list.php             ">   View Tables         </a></li>
                             <li><a href="/user/views/view_detail_types.php     ">   User Details Types  </a></li>
                             <li><a href="/user/views/create_user.php           ">   Add User            </a></li>
                             <li><a href="/user/views/create_group.php          ">   Add Group           </a></li>
                             <li><a href="/user/views/view_logs.php             ">   View App Logs       </a></li>
                             <li><a href="/user/views/view_changelogs.php       ">   View Changelogs     </a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
';
}
function print_color_meanings(){
    echo '
                <hr>
                <div class="col-xs-12 col-md-2"><h1>Colours meaning</h1></div>
                <div class="col-xs-12 col-md-7">
                    <ul>
                        <li><spanred><h5><b>RED</b></h5></spanred> = HIGH PRIORITY / HIGH DIFFICULTY</li>
                        <li><spanyel><h5><b>YELLOW</b></h5></spanyel> = NORMAL PRIORITY / NORMAL DIFFICULTY</li>
                        <li><spangre><h5><b>GREEN</b></h5></spangre> = LOW PRIORITY / LOW DIFFICULTY</li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-3"></div>
    ';
}

function print_to_do_list(){
    echo'
                <ol>
                    <li><h5><spanred>AJAX / Jquery @ editing user (if changing username , not to be able to select an already existing username) </spanred></h5></li>
                    <li><h6><spanyel>TO_DO_LIST implementation (view,edit,delete,update)(not hardcoded like now)</spanyel></h6></li>
                    <li><h6><spangre>PRINT DATABASE STATISTICS as : how many programmers, how many users in total , how many designer , how many X.</spangre></h6>  </li>
                    <li><h6><spangre>Print "last created user";</spangre></h6></li>
                    <li><h6><spangre>Print User with most details entered</spangre></h6></li>
                </ol>    
                <!--
                    RED :
                    <li><h6><spanred></spanred></h6></li>
                    YELLOW :
                    <li><h6><spanyel></spanyel></h6></li>
                    GREEN :
                    <li><h6><spangre></spangre></h6></li>                  
                -->                  
    ';
}




/**********************************************************************************************************************************************
EEEEEEEEEEEE**NNN*******NNN***DDDDDDDDD*******TTTTTTTTTT****EEEEEEEEEEEE**MMM*******MM***PPPPPPPPP***LLL*************AA******TTTTTTTTTTT**EEEEEEEEEEEE
EEEEEEE*******NNNN******NNN***DDD*****DDD********TTTT*******EEEEEEE*******MMMM**M**MMM***PPP****PPP**LLL************AAAA*********TTTT*****EEEEEEE*****
EEEE**********NNNNN*****NNN***DDD******DDD*******TTTT*******EEEE**********MMMMMMMMMMMM***PPP****PPP**LLL***********AA**AA********TTTT*****EEEE********
EEEE**********NN**NN****NNN***DDD*******DDD******TTTT*******EEEE**********MM***MMM**MM***PPPPPPPPP***LLL**********AA****AA*******TTTT*****EEEE********
EEEE**********NN***NN***NNN***DDD********DDD*****TTTT*******EEEE**********MM********MM***PPPPPPPP****LLL*********AA******AA******TTTT*****EEEE********
EEEEEEEEEEEE**NN****NN**NNN***DDD********DDD*****TTTT*******EEEEEEEEEEEE**MM********MM***PPP*********LLL********AAAAAAAAAAAA*****TTTT*****EEEEEEEEEEEE
EEEE**********NN****NN**NNN***DDD********DDD*****TTTT*******EEEE**********MM********MM***PPP*********LLL********AA********AA*****TTTT*****EEEE********
EEEE**********NN*****NN*NNN***DDD*******DDD******TTTT*******EEEE**********MM********MM***PPP*********LLL********AA********AA*****TTTT*****EEEE********
EEEE**********NN******NNNNN***DDD******DDD*******TTTT*******EEEE**********MM********MM***PPP*********LLL********AA********AA*****TTTT*****EEEE********
EEEEEEEE******NN*******NNNN***DDD*****DDD********TTTT*******EEEEEEEE******MM********MM***PPP*********LLLLLLLLL**AA********AA*****TTTT*****EEEEEEEE****
EEEEEEEEEEEE**NN********NNN***DDDDDDDDD**********TTTT*******EEEEEEEEEEEE**MM********MM***PPP*********LLLLLLLLL**AA********AA*****TTTT*****EEEEEEEEEEEE
/**********************************************************************************************************************************************/

}?>


