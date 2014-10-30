<?php 
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
require_once('../controllers/function_call_log.php');
require_once('../controllers/changelog_controller.php');
require_once('../controllers/todo_controller.php');
?>

<?php 

validate_insert_new_todo();

function validate_insert_new_todo(){
	if(isset($_POST) && !empty($_POST)){

		if(isset($_POST['colour'])){
			print_r($_POST);
			if (!empty($_POST['todo_text'])){
		$name_with_heading = '<'.$_POST['heading_type'].'>'.$_POST['todo_text'].'</'.$_POST['heading_type'].'>';
		$colour = $_POST['colour'];
		$todo = new Todo;
		$todo->create_todo_row($name_with_heading,$colour);
		}
		header("Location: /user/views/todo_temporary_view.php");
		die();
		}elseif(isset($_POST['day'])){/*print_r($_POST);*/}	
		}else{}
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



function generate_todo_table_html($days){
	generate_todo_table_header($days);
	generate_todo_table_content($days);
	generate_todo_table_footer();
}

function generate_todo_table_header($days){
echo '<br />';
echo '<div class="col-xs-12 col-md-12">';
echo '<table class="table table-bordered">';
echo '<th class="success">Name</th>';
echo '<th class="success">Created</th>';
}
function generate_todo_table_content($days){
	$todo = new Todo();
	$todos = $todo->read_todo();
	foreach ($todos as $individual_todo) {
			$type = 'todo';
				echo '<tr>';
                echo '<td><'.$individual_todo['colour'].'>'. $individual_todo['name'] .'</'.$individual_todo['colour'].'></td>';             
                echo '<td>'. $individual_todo['date'] . '</td>';
                echo '</tr>';
		}
}
function generate_todo_table_footer(){
echo '</table></div>';
}




function generate_todo_add_new_form(){
	echo '		<form class="form" id="add_new_todo_form" action="../models/todo_model.php" method="post">
						<label>Add New Todo</label><br />
							<input name="todo_text"  type="text"  placeholder="Todo text"> <br />
							<br />
							<select name="colour" id="colour" form="add_new_todo_form">
								<option selected="null" value="spanred">Red (hard)</option>
								<option value="spanyel">Yellow (normal)</option>
								<option value="spangre">Green (easy)</option>
							</select><br /><br />
							<select name="heading_type" id="heading_type" form="add_new_todo_form">
								<option selected="null" value="h5">H5</option>
		';
							generate_todo_select_heading_options();
	echo '
							</select><br /><br />
							<button type="submit" class="btn btn-success">Add New Todo</button>
				</form> 
		';
}

function generate_todo_select_heading_options(){
	for ($i=1;$i<=6;$i++){
		echo '<option value="h'.$i.'">H'.$i.'</option>';
	}
}



?>