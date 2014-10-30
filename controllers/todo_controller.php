<?php 

class Todo extends Crud { 
	//Constructor function for class Changelog.
	function __construct(){
		parent::__construct('todo');
	}
	 function create($array,$table = 'todo_list'){
		return parent::create($array,$table);
	}
	function read($table_name = 'todo_list'){
		return parent::read($table_name);
	}
	
	 function list_todo($table_name = 'todo_list'){
		return parent::read($table_name);
	}

	function read_todo($table_name = 'todo_list'){
		$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	  	$statement = $this->db->prepare("SELECT * FROM todo_list ORDER BY date DESC");
	  	$statement->execute();
	  	return $statement;
	 }

	 function create_todo_row($name,$colour){
	 	$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	 	$date_created = time();
	 	$statement = $this->db->prepare("INSERT INTO todo_list (name,colour,date) VALUES (?,?,NOW())");
	 	$statement->bindParam(1,$name);
	 	$statement->bindParam(2,$colour);
	 	$statement->execute();
	}

	function read_todo_for_last_24_hours($day,$limit){
		$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	  	$statement = $this->db->prepare("SELECT * FROM todo_list WHERE date >= NOW() - INTERVAL 1 DAY ORDER BY date DESC  ");
	  	$statement->bindParam(1,$day);
	  	$statement->bindParam(2,$limit);
	  	$statement->execute();
	  	return $statement;
	}

	function read_todo_for_last_x_days($days = '0'){
		$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
	  	$statement = $this->db->prepare("SELECT * FROM todo_list WHERE date >= CURDATE() - ? ORDER BY date DESC");
	  	$statement->bindParam(1,$days);
	  	$statement->execute();
	  	return $statement;
	}


	function generate_todo_list_html(){
	$todo = new Todo();
	$todos = $todo->read_todo();
	echo "<ol>";
	foreach ($todos as $individual_todo) {
		echo '<li><'.$individual_todo['colour'].'>'. $individual_todo['name'] .'</'.$individual_todo['colour'].'></li>';
	}
	echo "</ol>";
}
	
	function generate_todo_list_html_admin(){
	$todo = new Todo();
	$todos = $todo->read_todo();
	$lines = $todos->rowCount();
	if ($lines>0){
	echo "<ol>";
	foreach ($todos as $individual_todo) {
		echo '<li>';
		echo '<'.$individual_todo["colour"].'>'. $individual_todo["name"] .'</'.$individual_todo["colour"].'/>';		
		echo '<a><span onclick="confirm_delete_todo('.$individual_todo["id"].')" class="glyphicon glyphicon-remove spanred pointer"></span></a>';
		echo'</li>';
	}
	echo "</ol>";
	 echo '';
	}else{
		echo "nothing to do yet.";
	}
}

	function delete_todo_by_id_from_db($id){
		$this->db = new Database();
	 	$this->db = $this->db->dbConnect();
		$statement = $this->db->prepare("DELETE FROM user_groups.todo_list WHERE todo_list.id = ?");
		$statement->bindParam(1,$id);
		$statement->execute();
		return $statement;
	}

}


?>