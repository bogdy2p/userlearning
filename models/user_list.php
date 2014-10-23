<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>


<?php 

function generate_users_table_html(){
	generate_users_table_header();
	generate_users_table_content();
    generate_users_table_footer();
}

function generate_users_table_header(){
		echo '<div class="col-xs-12 col-md-8">';
		echo "<h3>ALL USERS : </h3>";
		echo '<table class="table table-bordered">';
		echo '<th class="danger">ID</th>';
		echo '<th class="danger">Username</th>';
		echo '<th class="danger">Groups of Belonging</th>';
		echo '<th class="danger">View User</th>';
		echo '<th class="danger">Edit User</th>';
		echo '<th class="danger">Delete User</th>';
}
function generate_users_table_content(){
	$user = new User();
	$group = new Group();
	$users = $user->list_users();
	foreach ($users as $individual_user) {
					$type = 'users';
					$userid = $individual_user['id'];
					$groups_array = $user->get_number_of_groups_for_a_user($userid);
                     echo '<tr>';
                     echo '<td class="success">'. $individual_user['id'] . '</td>';
                     echo '<td>'. $individual_user['name'] . '</td>';
                     echo '<td>'.  implode(" / ",$groups_array) . '</td>';
                     echo "<td><a class=\"btn btn-success\" href=\"../views/view_user.php?id={$individual_user['id']}\">View</td>";
                     echo "<td><a class=\"btn btn-primary\" href=\"../views/edit_user.php?id={$individual_user['id']}&type={$type}\">Edit</td>";
                     echo "<td><a class=\"btn btn-danger\" href=\"../models/delete.php/?id={$individual_user['id']}&type={$type}\">Delete</td>";
                     echo '</tr>';
    }
}
function generate_users_table_footer(){
	echo '</table></div>';
}

?>