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


	<form class="form" id="viewuser" action="view_user.php" method="post"><br /><br />
	<select name="id" id="id" form="viewuser">
					 <?php 
					 	$users = new User();
					 	$id_array = $users->grab_all_user_ids();
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$value}</option>";
					 	}
					 ?>
	</select>

		<button type="submit" class="button">View User's Data</button>
	</form>

<?php 
		if(isset($_POST['id']) && ($_POST['id'] > 0)){
		$user = new User();
		$user->get_user_object_by_id($_POST['id']);

		// DISPLAY (this is practically the VIEW //
				echo '<table class="default_css_table">';
				echo '<th>ID</th>';
				echo '<th>Username</th>';
				echo '<th>Password</th>';
				echo '<th>Details</th>';
				echo '<th>Group Id</th>';
				echo '<tr>';
                echo '<td>'. $user->id .'</td>';
				echo '<td>'. $user->username . '</td>';
				echo '<td>'. $user->password . '</td>';
				echo '<td>'. $user->details . '</td>';
				echo '<td>'. $user->group_id . '</td>';	
                echo '</tr>';
            	echo '</table>';
		}
?>
</div>
</body>

<html>

