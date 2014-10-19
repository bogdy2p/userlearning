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
							else {
								
								die("There already is a user called {$array['name']}");
								 }		
				echo "A new ". $table . " object ( ". $this->id ."  ) succesfully created. <br />";
						}
			else {
				die ("ERR : Object with id = ". $array['id'] ." allready exists in ". $table);
			}
		}
	}
	
	
	function update($id, $table, $update_params_array){
		$exists = Crud::verify_object_exists($id,$table);
		if(($exists) && (!empty($update_params_array))) {

				if ($table == 'users'){
							$statement = $this->db->prepare("UPDATE users SET name=?, password=?, details=?, group_id=? WHERE id=?");
							$statement->bindParam(1, $update_params_array['name']);
							$statement->bindParam(2, $update_params_array['password']);
							//Implode =  Un fel de toString.
							$statement->bindParam(3, implode(";",$update_params_array['details']));
							$statement->bindParam(4, $update_params_array['group_id']);
							$statement->bindParam(5, $id);
							//print_r("EXECUTED UPDATE USERS SQL. <br />");
							//print_r($statement);
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
	 	//Verify that an object with that id exists in the table
	 	$exists = Crud::verify_object_exists($id,$table);
	 	//print_r($exists);
	 	if($exists){
	 		$statement = $this->db->prepare("DELETE FROM user_groups." . $table . " WHERE ".$table.".id=?");
	 		$statement->bindParam(1, $id);
	 		$statement->execute();
	 		//print_r($statement);
	 		//print_r("Removed object with id {$id} from {$table}");	 		
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


}
 ?>
