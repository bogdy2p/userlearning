<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php 
function generate_groups_table(){
	$group = new Group();
		
	echo '<div class="col-xs-6 col-md-6">';
	echo "<h3>ALL GROUPS :</h3>";
	$groups = $group->list_groups();
				echo '<table class="table table-bordered">';
				echo '<th class="success">Id</th>';
				echo '<th class="success">Group Name</th>';
				echo '<th class="success">Special Key</th>';
				echo '<th class="success">Edit Group</th>';
				echo '<th class="success">Delete Group</th>';
		foreach ($groups as $individual_group) {
			$type = 'groups';
				echo '<tr>';
                echo '<td class="warning">'. $individual_group['id'] . '</td>';
                echo '<td>'. $individual_group['name'] . '</td>';
                echo '<td>'. $individual_group['special_key'] . '</td>';
                echo "<td><a class=\"btn btn-primary\" href=\"../views/edit_group.php?id={$individual_group['id']}&type={$type}\">Edit</td>";
                echo "<td><a class=\"btn btn-danger\" href=\"../models/delete.php/?id={$individual_group['id']}&type={$type}\">Delete</td>";
                echo '</tr>';
		}
				echo '</table>';
echo '</div>';


}

function generate_groups_users_table(){
	$user = new User();
	$group = new Group();
	$users = $user->list_users();
	$groups = $group->list_groups();
	echo '<div class="col-xs-12 col-md-12">';
	
	echo '<div class="row">';
foreach ($groups as $group) {
	
	$groupname = $group['name'];
	$group_id = $group['id'];
	$userids_from_group = $user->get_userids_for_a_group($group_id);	

		echo '<div class="col-xs-3 col-md-3"><h3>'.$groupname.'\'s (must remove from here)</h3>';
		echo '<table class="table table-bordered" name="'.$groupname.' group">';
		echo '<th class="info">username</th>';
		echo '<th class="info">corresponding id</th>';
							foreach ($userids_from_group as $key => $value) {
								echo "<tr>";
										print_r("<td>".$user->get_name_by_id($value)."</td>");
										print_r("<td>".$value."</td>");
								echo "</tr>";
							}
		echo "</table><br /><br /><br />";
		echo '</div>';
		
	}
	echo '</div> <!-- end of div class row-->';

	echo '</div><!-- end of div class COLUMN-->';
}

?>