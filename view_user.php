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

echo "<h4>All users : </h4>";
$user->list_userdata_by_id(1);
echo "<br />";


?>
</div>
</body>

<html>

