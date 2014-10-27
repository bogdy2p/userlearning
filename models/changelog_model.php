<?php
//INCLUDE THE CONTROLLERS
require_once('../controllers/database.php');
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
require_once('../controllers/function_call_log.php');
require_once('../controllers/changelog_controller.php');
?>


<?php

validation_and_insertion_of_a_new_changelog();

function validation_and_insertion_of_a_new_changelog(){

	if(isset($_POST) && !empty($_POST)){
		echo "<h1>POST IS SET / NOT NULL</h1>";
		print_r($_POST);
		$name_with_heading = '<'.$_POST['heading_type'].'>'.$_POST['changelog_text'].'</'.$_POST['heading_type'].'>';
		$colour = $_POST['colour'];
		$changelog = new Changelog;
		$changelog->create_changelog_row($name_with_heading,$colour);
		header("Location: /user/views/view_changelogs.php");
		die();

	}else{
		//echo "<h1>NOT SET / NULL</h1>";
	}




function generate_changelog_table_html(){
	generate_changelog_table_header();
	generate_changelog_table_content();
	generate_changelog_table_footer();
}
function generate_changelog_table_header(){
	echo '<div class="col-xs-12 col-md-12">';
	echo "<h3>ALL CHANGE LOGS :</h3>";
	echo '<table class="table table-bordered">';
	//echo '<th class="success">Id</th>';
	echo '<th class="success">Name</th>';
	echo '<th class="success">Created</th>';
}
function generate_changelog_table_content(){
	$changelog = new Changelog();
	$changelogs = $changelog->read_changelogs();
	foreach ($changelogs as $individual_changelog) {
			$type = 'changelogs';
				echo '<tr>';
               // echo '<td class="warning">'. $individual_changelog['id'] . '</td>';
                echo '<td><'.$individual_changelog['colour'].'>'. $individual_changelog['name'] .'</'.$individual_changelog['colour'].'></td>';
                //echo '<td>'. $individual_changelog['colour'] . '</td>';
                echo '<td>'. $individual_changelog['date'] . '</td>';
                echo '</tr>';
		}
}
function generate_changelog_table_footer(){
	echo '</table></div>';
}

function generate_changelog_add_new_form(){
	echo '		<form class="form" id="add_new_changelog_form" action="../models/changelog_model.php" method="post">
						<label>Add Changelog</label><br />
							<input name="changelog_text"  type="text"  placeholder="Changelog text"> <br />
							<br />
							<select name="colour" id="colour" form="add_new_changelog_form">
								<option selected="null" value="spanred">Red (hard)</option>
								<option value="spanyel">Yellow (normal)</option>
								<option value="spangre">Green (easy)</option>
							</select><br /><br />
							<select name="heading_type" id="heading_type" form="add_new_changelog_form">
								<option selected="null" value="h5">H5</option>
		';
							generate_select_heading_options();
	echo '
							</select><br /><br />
							<button type="submit" class="btn btn-success">Add Changelog</button>
			</form> 
		';
}

function generate_select_heading_options(){
	for ($i=1;$i<=6;$i++){
		echo '<option value="h'.$i.'">H'.$i.'</option>';
	}
}

function generate_select_day_list(){
	echo 'HERE , This function should generate a select list , and when selected , it should display only the values that correspond to the select query.';
}





}


?>