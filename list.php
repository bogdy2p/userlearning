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

<?php 
$user = new User();
$group = new Group();

echo "All users : ";
$user->list_all_users();
echo "<br />";
echo "All groups :";
$group->list_all_groups();
?>
</body>

<html>

