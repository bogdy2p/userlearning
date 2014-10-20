<?php
require_once 'database.php';

abstract class Crud {

	public $obj = '';
	private $id = 0;
	private $db;

	public function __construct($obj){
		$this->db = new Database();
		$this->db = $this->db->dbConnect();
		$this->obj = $obj;
	}

	/// Add an empty row to the database specified table (only with the id of the object)
	function create($array,$table){
		if(isset($array['id']) && ($array['id'] != 0)){
			$exists = Crud::verify_object_exists($array['id'],$table);
			$already_exists = Crud::verify_name_exists_in_table($array['name'],$table);
			
			////IF THERE IS NO OBJECT WITH THAT ID ALREADY
				if(!$exists){
					// IF THERE IS NO OBJECT WITH THAT USERNAME ALREADY
					if(!$already_exists){

							$object_id = $array['id'];
							$this->id = $array['id'];
											if ($table == 'users'){
												$sql = $this->db->prepare("insert into users (id) VALUES (:object_id)");
											}elseif ($table == 'groups'){
												$sql = $this->db->prepare("insert into groups (id) VALUES (:object_id)");
											}else{
												die("we only have 2 tables momentarely!");
											}
											$sql->execute(array(':object_id' => $this->id));
										}

							else { 	die("There already is a object called {$array['name']} into table {$table}"); 
								 }

				echo "A new ". $table . " object ( ". $this->id ."  ) succesfully created. <br />";
						}
			else { die ("ERR : Object with id = ". $array['id'] ." allready exists in ". $table); 
				 }
		}
	}
	
	
	function update($id, $table, $update_params_array){
		$exists = Crud::verify_object_exists($id,$table);
		if(($exists) && (!empty($update_params_array))) {

				if ($table == 'users'){
							$statement = $this->db->prepare("UPDATE users SET name=?, password=?, details=? WHERE id=?");
							$statement->bindParam(1, $update_params_array['name']);
							$statement->bindParam(2, $update_params_array['password']);
							//Implode =  Un fel de toString.
							$statement->bindParam(3, implode(";",$update_params_array['details']));
							$statement->bindParam(4, $id);
									  }
				elseif ($table == 'groups'){

				$statement = $this->db->prepare("UPDATE groups SET id=?, name=?, special_key=? WHERE id=? ");
				$statement->bindParam(1, $update_params_array['id']);
				$statement->bindParam(2, $update_params_array['name']);
				$statement->bindParam(3, $update_params_array['special_key']);
				$statement->bindParam(4, $id);
				//print_r("EXECUTED UPDATE GROUPS SQL. <br />");
				//print_r($statement);
					}
			$statement->execute(); // this should be called inside the child class !?!?!
		}else{
			echo("Object id {$id} doesnt exist in db , table is incorrect , or params array is empty <br />");
		}
	 }

	 function delete($id, $table) {
	 	
	 	$exists = Crud::verify_object_exists($id,$table);
	 	 	if($exists){
	 		$statement = $this->db->prepare("DELETE FROM user_groups." . $table . " WHERE ".$table.".id=?");
	 		$statement->bindParam(1, $id);
	 		$statement->execute();
	 	 	}else{
	 		//print_r("There is no such entry in the whole database. Nothing to delete.");
	 	}
	 }

	 //Return type : BOOLEAN or DIE(error);
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
		print_r("Mapped user {$uid} to group {$gid}. ");
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

	function get_name_by_id($id,$table_name){
		$statement = $this->db->prepare("SELECT name FROM ".$table_name. " WHERE id=?");
		$statement->bindParam(1,$id);
		$statement->execute();
		foreach ($statement as $row) {
			return $row['name'];
		}
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
			//$groups_array[] = $group['group_id'];
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
}
 ?>


