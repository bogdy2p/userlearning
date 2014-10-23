<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php 

function generate_groups_table_html(){
	generate_groups_table_header();
	generate_groups_table_content();
	generate_groups_table_footer();
}

function generate_groups_table_header(){
	echo '<div class="col-xs-12 col-md-3">';
	echo "<h3>ALL GROUPS :</h3>";
	echo '<table class="table table-bordered">';
	echo '<th class="success">Id</th>';
	echo '<th class="success">Group Name</th>';
	echo '<th class="success">Special Key</th>';
	echo '<th class="success">Edit</th>';
	echo '<th class="success">Delete</th>';
}
function generate_groups_table_content(){
	$group = new Group();
	$groups = $group->list_groups();
	foreach ($groups as $individual_group) {
			$type = 'groups';
				echo '<tr>';
                echo '<td class="warning">'. $individual_group['id'] . '</td>';
                echo '<td>'. $individual_group['name'] . '</td>';
                echo '<td>'. $individual_group['special_key'] . '</td>';
                //echo "<td><a class=\"btn btn-primary\" href=\"../views/edit_group.php?id={$individual_group['id']}&type={$type}\">Edit</td>";
                //echo "<td><a class=\"btn btn-danger\" href=\"../models/delete.php/?id={$individual_group['id']}&type={$type}\">Delete</td>";
                echo '<td><a href="../views/edit_group.php?id='.$individual_group["id"].'&type='.$type.'"><span class="glyphicon glyphicon-edit spangre"></td>';
                echo '<td><a href="../models/delete.php/?id='.$individual_group["id"].'&type='.$type.'"><span class="glyphicon glyphicon-remove spanred"></span></td>';
                echo '</tr>';
		}
}
function generate_groups_table_footer(){
	echo '</table></div>';
}

function generate_groups_users_table_html(){
	generate_groups_users_table_header();
	generate_groups_users_table_content();
	generate_groups_users_table_footer();
}

function generate_groups_users_table_header(){
	echo '<div class="col-xs-12 col-md-4">
			<h3>Users by group</h3>';
	echo '<table class="table table-bordered" name="groups_users">';
}



function generate_groups_users_table_content(){
	$user = new User();
	$group = new Group();
	$groups = $group->list_groups();
	foreach ($groups as $group) 
		{
			$userids_array = $user->get_userids_for_a_group($group['id']);	
			echo '<th class="info">'.$group["name"].'\'s</th>';
			echo '<th class="info">corresponding id</th>';
								foreach ($userids_array as $key => $value) {
									echo "<tr>";
											print_r("<td>".$user->get_name_by_id($value)."</td>");
											print_r("<td>".$value."</td>");
									echo "</tr>";
								}
		}
}

function generate_groups_users_table_footer(){
	echo "</table>
		  </div>";
}

?>