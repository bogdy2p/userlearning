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

	function create($array){
		if(isset($array['id'])) {
			$this->id = $array['id'];
		}else{
			$this->id = 0;
		}
		$_SESSION[$this->obj][$this->id] = $array;
	}
	///////////////////////////////////////////
	/////////DATABASE INSERT OBJECT (USER / GROUP)
	///////////////////////////////////////////
	function create_empty_user_object($array){

		if(isset($array['id'])){
			$exists = Crud::verify_object_exists($array['id'],'users');
				if(!$exists){
			$object_id = $array['id'];
		$sql = $this->db->prepare("insert into users (uid) VALUES (:object_id)");
		$sql->execute(array(':object_id' => $object_id));
				echo "A new user with uid ". $object_id ." has been succesfully initiated / inserted into db..";
			}
			else {
				die("ERROR . A object with uid = ". $array['id'] ." allready exists in table USERS");
			}
		}
	}

	function verify_existence($uid, $username){
		if(!empty($uid) && !empty($username)){
			$st = $this->db->prepare("select * from users where uid=? and username=?");
			$st->bindParam(1, $uid);
			$st->bindParam(2, $username);
			$st->execute();

			if($st->rowCount() >= 1){
				return true;
				//echo "At least one user object with that parameters exists. ";
			}else{
				return false;
				//echo "No users object exist with that user id and username";
			}
		}else{
			die("Error. username and password empty");
		}
	}
	//Function takes parameters : id of the object , name of the table.
	//Function that returns true if there already is an object with that id in the table , or false.
	function verify_object_exists($object_id,$table_name){
		if(!empty($object_id) && !empty($table_name)){
			$statement = $this->db->prepare("SELECT * FROM ". $table_name . " WHERE uid=?");
			$statement->bindParam(1, $object_id);
			$statement->execute();
			if($statement->rowCount() >= 1){
				return true;
			}else{
				return false;
			}
		}else{
			echo "parameters error";
			die();
		}
	}

	function read($obj, $id){
		return $_SESSION[$obj][$id];
	 }

	function update($obj, $id, $params){
	 	if(isset($_SESSION[$obj][$id]) && !empty($params)) {
	 		foreach($params as $key=>$val) {
	 			$_SESSION[$obj][$id][$key] = $val;
	 		} 
	 	}
	 }
	 function delete($obj, $id){
	 	unset($_SESSION[$obj][$id]);
	 }

}
 ?>
