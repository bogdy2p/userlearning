<?php
require_once('classes/database.php');
require_once 'classes/crud.php';
require_once('classes/user.php');
require_once('classes/group.php');
?>

<!DOCTYPE html>

<head>
	<title>UserLearning Pbc Project</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>

<body>
<div class ="content">
<a href="/user"><h4 align="center">Go back.</h4></a>
<?php 
$user = new User();
$group = new Group();

echo "<h3>All users : </h3>";
///$user->list_all_users();
$users = $user->list_users();

//print_r($users);
/////////////////////DISPLAY USERS TABLE AND EDIT / DELETE NEAR IT/////////////////////

					echo '<table class="default_css_table">';
					echo '<th>ID</th>';
					echo '<th>Username</th>';
					echo '<th>Password</th>';
					echo '<th>Details</th>';
					echo '<th>Group Id</th>';
					echo '<th>Edit Link</th>';
					echo '<th>Delete Link</th>';
		foreach ($users as $individual_user) {
                     echo '<tr>';
                     echo '<td>'. $individual_user['id'] . '</td>';
                     echo '<td>'. $individual_user['username'] . '</td>';
                     echo '<td>'. $individual_user['password'] . '</td>';
                     echo '<td>'. $individual_user['details'] . '</td>';
                     echo '<td>'. $individual_user['group_id'] . '</td>';
                     echo "<td><a href=\"edit.php/{$individual_user['id']}\">Edit</td>";
                     echo "<td><a href=\"delete.php/{$individual_user['id']}\">Delete</td>";
                     echo '</tr>';
           }
           			echo '</table>';

echo "<br />";
echo "<h3>All groups :</h3>";
$group->list_all_groups();
?>
</div>
</body>

<html>

