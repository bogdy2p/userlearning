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
		$user->grab_userdata_table_by_id($_POST['id']);
		}
?>
</div>
</body>

<html>

