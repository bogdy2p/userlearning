<?php

abstract class Crud {

	public $obj = '';
	private $id = 0;

	public function __construct($obj){
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
