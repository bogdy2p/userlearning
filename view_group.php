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


	<form class="form" id="viewgroup" action="view_group.php" method="post"><br /><br />

	<select name="id" id="id" form="viewgroup">
					 <?php 
					 	$groups = new Group();
					 	$id_array = $groups->grab_all_group_ids();
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$value}</option>";
					 	}
					 ?>
	</select>

		
		<button type="submit" class="button">View Group's Data</button>
	</form>

<?php 

		if(isset($_POST['id']) && ($_POST['id'] > 0)){
		$group = new Group();
		$group->grab_groupdata_table_by_id($_POST['id']);

		}
	


?>
</div>
</body>

<html>

