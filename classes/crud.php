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

	function read2($id, $username){
		if(!empty($id) && !empty($username)){
			$st = $this->db->prepare("select * from users where id=? and username=?");
			$st->bindParam(1, $id);
			$st->bindParam(2, $username);
			$st->execute();

			if($st->rowCount() >= 1){
				echo "At least one user object with that parameters exists. ";
			}else{
				echo "No users object exist with that user id and username";
			}

		}else{
			echo "Error. username and password empty";
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
