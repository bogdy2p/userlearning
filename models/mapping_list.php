<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php 
function generate_mapping_table_html(){
	generate_mapping_table_header();
	generate_mapping_table_content();
	generate_mapping_table_footer();
}
function generate_mapping_table_header(){
	echo '<div class="col-xs-12 col-md-4">';
	echo "<h3>MAPPING TABLE :</h3>";
	echo '<table class="table table-bordered">';
	echo '<th class="warning">Id</th>';
	echo '<th class="warning">User ID</th>';
	echo '<th class="warning">Group ID</th>';
	echo '<th class="warning">Remove</th>';
}
function generate_mapping_table_content(){
	$user = new User();
	$group = new Group();
	$mapping_table = $user->get_mapping_table_data();
	foreach ($mapping_table as $table) {
	$map_id = $table['id'];
	$type='usergroups';
	echo '<tr>';
	echo '<td class="info">'.$table['id'].'</td>';
	echo '<td>' . $table['user_id'] . ' - ' . $user->get_name_by_id($table['user_id']) .'</td>';
	echo '<td>' . $table['group_id'] . ' - ' . $group->get_name_by_id($table['group_id']) .'</td>';
	echo '<td><a href="../models/delete.php?id='.$map_id.'&type='.$type.'"><span class="glyphicon glyphicon-remove spanred"></span></td>';
	echo '</tr>';
	}
}
function generate_mapping_table_footer(){
	echo "</table>";
	echo "</div>";
}
?>