<?php
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

		if(isset($_POST['colour'])){
			print_r($_POST);
			if (!empty($_POST['changelog_text'])){
		$name_with_heading = '<'.$_POST['heading_type'].'>'.$_POST['changelog_text'].'</'.$_POST['heading_type'].'>';
		$colour = $_POST['colour'];
		$changelog = new Changelog;
		$changelog->create_changelog_row($name_with_heading,$colour);
		}
		header("Location: /user/views/view_changelogs.php");
		die();
		}elseif(isset($_POST['day'])){/*print_r($_POST);*/}	
		}else{}
}


function generate_changelog_table_html($days){
	generate_changelog_table_header($days);
	generate_changelog_table_content($days);
	generate_changelog_table_footer();
}
function generate_changelog_table_header($days){
	echo '<div class="col-xs-12 col-md-12">';
	if($days == 0){
		echo "<h3>TODAY'S CHANGE LOGS: </h3>";
	}elseif($days == 1){
		echo '<h3>CHANGELOGS SINCE YESTERDAY:</h3>';
	}elseif($days >1 && $days<=10){
		echo '<h3>LAST '.$days - 1 .' DAYS CHANGE LOGS :</h3>';
	}else{
		echo '<h3> ALL CHANGELOGS AVAILLABLE :</h3>';
	}

	
	echo '<table class="table table-bordered">';
	echo '<th class="success">Name</th>';
	echo '<th class="success">Created</th>';
}
function generate_changelog_table_content($days){
	$changelog = new Changelog();
	$changelogs = $changelog->read_changelogs_for_last_x_days($days);
	foreach ($changelogs as $individual_changelog) {
			$type = 'changelogs';
				echo '<tr>';
                echo '<td><'.$individual_changelog['colour'].'>'. $individual_changelog['name'] .'</'.$individual_changelog['colour'].'></td>';             
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

function generate_select_day_form(){
echo '
	<br /><br /><br /><br /><br />
	<form class="form" id="day_form" action="../views/view_changelogs.php" method="post">
				<select name="day" id="day" form="day_form">
					<option value="0">Today</option>
					<option value="1">Yesterday</option>
					<option value="100">All period</option>
				</select> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="submit" class="btn btn-success">Change Chosen Period</button>
	</form>
	';
}

function generate_changelog_table_by_post(){
	if ((isset($_POST)) && !empty($_POST)){
		generate_changelog_table_html($_POST['day']);
	}else{
		generate_changelog_table_html(0);
	}
}
?>