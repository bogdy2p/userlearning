<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<!DOCTYPE html>

<head>
	<title>UserLearning Pbc Project</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css"> 
</head>

<body>
<div class ="content">
<a href="/user"><h4 align="center">Go back.</h4></a>
<?php 
$user = new User();
$group = new Group();
echo "<pre>";
echo "<h3>ALL USERS : </h3>";
$users = $user->list_users();

/////////////////////DISPLAY USERS TABLE AND EDIT / DELETE NEAR IT/////////////////////

					echo '<table class="default_css_table">';
					echo '<th>ID</th>';
					echo '<th>Username</th>';
					echo '<th>Password</th>';
					echo '<th>Details</th>';
					echo '<th>Groups of Belonging</th>';
					echo '<th>Edit Link</th>';
					echo '<th>Delete User</th>';
		foreach ($users as $individual_user) {
					$type = 'users';
					$userid = $individual_user['id'];
					$groups_array = $user->get_number_of_groups_for_a_user($userid);
					$details_array = $user->get_user_details_array($userid);
                     echo '<tr>';
                     echo '<td>'. $individual_user['id'] . '</td>';
                     echo '<td>'. $individual_user['name'] . '</td>';
                     echo '<td>'. $individual_user['password'] . '</td>';
                     echo '<td>'. implode(";",$details_array) . '</td>';
                     echo '<td>'.  implode(" / ",$groups_array) . '</td>';
                     echo "<td><a href=\"../views/edit_user.php?id={$individual_user['id']}&type={$type}\">Edit</td>";
                     echo "<td><a href=\"../models/delete.php/?id={$individual_user['id']}&type={$type}\">Delete</td>";
                     echo '</tr>';
           }
           			echo '</table>';

echo "<br />";
echo "<h3>ALL GROUPS :</h3>";
$groups = $group->list_groups();
				echo '<table class="default_css_table">';
				echo '<th>Id</th>';
				echo '<th>Group Name</th>';
				echo '<th>Special Key</th>';
				echo '<th>Edit Link</th>';
				echo '<th>Delete Group</th>';
		foreach ($groups as $individual_group) {
			$type = 'groups';
				echo '<tr>';
                echo '<td>'. $individual_group['id'] . '</td>';
                echo '<td>'. $individual_group['name'] . '</td>';
                echo '<td>'. $individual_group['special_key'] . '</td>';
                echo "<td><a href=\"../views/edit_group.php?id={$individual_group['id']}&type={$type}\">Edit</td>";
                echo "<td><a href=\"../models/delete.php/?id={$individual_group['id']}&type={$type}\">Delete</td>";
                echo '</tr>';
		}
				echo '</table>';

echo "<br />";
echo "<h3>MAPPING TABLE :</h3>";

$mapping_table = $user->get_mapping_table_data();

				echo '<table class="default_css_table">';
				echo '<th>Id</th>';
				echo '<th>User ID</th>';
				echo '<th>Group ID</th>';
				echo '<th>Delete Mapping</th>';
foreach ($mapping_table as $table) {
	$map_id = $table['id'];
	$type='usergroups';
	echo '<tr>';
	echo '<td>'.$table['id'].'</td>';
	echo '<td>' . $table['user_id'] . ' - ' . $user->get_name_by_id($table['user_id']) .'</td>';
	echo '<td>' . $table['group_id'] . ' - ' . $group->get_name_by_id($table['group_id']) .'</td>';
	echo "<td><a href=\"../models/delete.php/?id={$map_id}&type={$type}\">Delete</td>";
	echo '</tr>';

}

echo "</table>";

echo "<h3>Group's Users.</h3>";


$groups = $group->list_groups();
foreach ($groups as $group) {
	$groupname = $group['name'];
	$group_id = $group['id'];
	echo '<h3>'.$groupname. '\'s </h3>';
	echo '<table class="default_css_table" name="'.$groupname.' group">';
	
	$userids_from_group = $user->get_userids_for_a_group($group_id);	
		echo "<th>username</th>";
		echo "<th>user_id</th>";
	foreach ($userids_from_group as $key => $value) {
		echo "<tr>";
		print_r("<td>".$user->get_name_by_id($value)."</td>");
		print_r("<td>".$value."</td>");
		echo "</tr>";
	}
	echo "</table>";
}


?>
</div>
</body>

<html>

