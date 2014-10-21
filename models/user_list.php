<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>


<?php 


function generate_users_table(){
	$user = new User();
	$group = new Group();
		echo '<div class="col-xs-12 col-md-12">';
		echo "<h3>ALL USERS : </h3>";
	$users = $user->list_users();
/////////////////////DISPLAY USERS TABLE AND EDIT / DELETE NEAR IT/////////////////////
					echo '<table class="table table-bordered">';
					echo '<th>ID</th>';
					echo '<th>Username</th>';
					echo '<th>Password</th>';
					echo '<th>Groups of Belonging</th>';
					echo '<th>Edit Link</th>';
					echo '<th>Delete User</th>';
		foreach ($users as $individual_user) {
					$type = 'users';
					$userid = $individual_user['id'];
					$groups_array = $user->get_number_of_groups_for_a_user($userid);
                     echo '<tr>';
                     echo '<td>'. $individual_user['id'] . '</td>';
                     echo '<td>'. $individual_user['name'] . '</td>';
                     echo '<td>'. $individual_user['password'] . '</td>';
                     echo '<td>'.  implode(" / ",$groups_array) . '</td>';
                     echo "<td><a class=\"btn btn-primary\" href=\"../views/edit_user.php?id={$individual_user['id']}&type={$type}\">Edit</td>";
                     echo "<td><a class=\"btn btn-danger\" href=\"../models/delete.php/?id={$individual_user['id']}&type={$type}\">Delete</td>";
                     echo '</tr>';
           }
           			echo '</table>';
echo "</div>";

}





?>