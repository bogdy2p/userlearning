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

	// function create($array){
	// 	if(isset($array['id'])) {
	// 		$this->id = $array['id'];
	// 	}else{
	// 		$this->id = 0;
	// 	}
	// 	$_SESSION[$this->obj][$this->id] = $array;
	// }

	///////////////////////////////////////////
	/////////DATABASE INSERT OBJECT (USER / GROUP) // MUST ABSTRACTIZE TO BE ABLE TO INSERT INTO BOTH USERS AND GROUPS
	///////////////////////////////////////////
	function create_db_empty_object($array,$table){
		if(isset($array['id'])){
			$exists = Crud::verify_object_exists($array['id'],$table);
				if(!$exists){
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
				echo "A new object ( ". $this->id ."  ) succesfully inserted into table ". $table;
				}
			else {
				die ("ERR : Object with id = ". $array['id'] ." allready exists in ". $table);
			}
		}
	}
	//db update verifies the object for existence , then if it exists , it updates it with the new values specified.
	function db_update($id, $table, $update_params_array){
		$exists = Crud::verify_object_exists($id,$table);
		if(($exists) && (!empty($update_params_array))) {
			$statement = $this->db->prepare("UPDATE users SET username=?, password=?, details=?, group_id=? WHERE id=?");
			//$statement->bindParam(1, $update_params_array['id']);
			$statement->bindParam(1, $update_params_array['username']);
			$statement->bindParam(2, $update_params_array['password']);
			//Implode =  Un fel de toString.
			$statement->bindParam(3, implode(";",$update_params_array['details']));
			$statement->bindParam(4, $update_params_array['group_id']);
			$statement->bindParam(5, $id);
			$statement->execute();

				echo "OBJECT FOUND. params not empty \n";
				$this->id = $id;
				$this->table = $table;
				$this->params = $update_params_array;
				print_r($statement);
		}else{
			echo "Object not found or params emprty";
		}
	 }

	 function db_delete($id, $table){
	 	$this->table = $table;
	 	$this->id = $id;
	 	//Verify that an object with that id exists in the table
	 	$exists = Crud::verify_object_exists($id,$table);
	 	if($exists){
	 		$statement = $this->db->prepare("DELETE FROM user_groups." . $this->table . " WHERE ".$this->table.".id=?");
	 		$statement->bindParam(1, $this->id);
	 		$statement->execute();
	 		print_r("Removed object with id {$this->id} from {$this->table}");
	 	}else{
	 		print_r("There is no such entry in the database. Nothing to delete.");
	 	}
	 	//DELETE FROM user_groups.users WHERE users.id = $id?
	 	
	 }


	function verify_existence($uid, $username){
		if(!empty($uid) && !empty($username)){
			$st = $this->db->prepare("select * from users where id=? and username=?");
			$st->bindParam(1, $uid);
			$st->bindParam(2, $username);
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
		///CHANGE TO USE BINDPARAM FOR TABLE NAME HERE to DISABLE SQLINJ !?!?
		if(!empty($object_id) && !empty($table_name)){
			$statement = $this->db->prepare("SELECT * FROM ". $table_name . " WHERE id=?");
			$statement->bindParam(1, $object_id);
			//print_r("VOE statement:");
			//print_r($statement);
			$statement->execute();
			if($statement->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
		}else{
			die("Parameters error");
		}
	}

	function read($obj, $id){
		return $_SESSION[$obj][$id];
	 }

	// function update($obj, $id, $params){
	//  	if(isset($_SESSION[$obj][$id]) && !empty($params)) {
	//  		foreach($params as $key=>$val) {
	//  			$_SESSION[$obj][$id][$key] = $val;
	//  		} 
	//  	}
	//  }
	 function delete($obj, $id){
	 	unset($_SESSION[$obj][$id]);
	 }

}
 ?>
