<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>


<?php 


function generate_mapping_table(){
	$user = new User();
	$group = new Group();
		
	echo '<div class="col-xs-6 col-md-6">';
	echo "<h3>MAPPING TABLE :</h3>";

$mapping_table = $user->get_mapping_table_data();
				echo '<table class="table table-bordered">';
				echo '<th class="warning">Id</th>';
				echo '<th class="warning">User ID</th>';
				echo '<th class="warning">Group ID</th>';
				echo '<th class="warning">Delete Mapping</th>';
foreach ($mapping_table as $table) {
	$map_id = $table['id'];
	$type='usergroups';
	echo '<tr>';
	echo '<td class="info">'.$table['id'].'</td>';
	echo '<td>' . $table['user_id'] . ' - ' . $user->get_name_by_id($table['user_id']) .'</td>';
	echo '<td>' . $table['group_id'] . ' - ' . $group->get_name_by_id($table['group_id']) .'</td>';
	echo "<td><a class=\"btn btn-danger\" href=\"../models/delete.php/?id={$map_id}&type={$type}\">Delete</td>";
	echo '</tr>';
}
echo "</table>";
echo "</div>";

}





?>