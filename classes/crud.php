<?php

abstract class Crud {

public $obj = '';

	abstract protected function create($array);
	abstract protected function read($array);
	abstract protected function update($array);
	abstract protected function delete($array);

	public function __construct($obj){
		$this->obj = $obj;
	}

	public function __destruct(){
		unset($this->obj);
	}
}
 ?>
