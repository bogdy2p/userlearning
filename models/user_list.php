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
		echo '<table class="table table-bordered" id="users_table">';
		echo '<th class="danger">ID</th>';
		echo '<th class="danger">Username</th>';
		echo '<th class="danger">Groups of Belonging</th>';
		echo '<th class="danger">View</th>';
		echo '<th class="danger">Edit</th>';
		echo '<th class="danger">Delete</th>';
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
                     echo '<td><a href="../views/view_user.php?id='.$individual_user["id"].'"><span class="glyphicon glyphicon-eye-open"></span></td>';
                     echo '<td><a href="../views/edit_user.php?id='.$individual_user["id"].'&type='.$type.'"><span class="glyphicon glyphicon-edit spangre"></span></td>';
                     echo '<td><a href="../models/delete.php/?id='.$individual_user["id"].'&type='.$type.'"><span class="glyphicon glyphicon-remove spanred"></span></td>';
                     echo '</tr>';
    }
}
function generate_users_table_footer(){
	echo '</table></div>';
}

?>