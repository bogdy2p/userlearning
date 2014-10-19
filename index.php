<!DOCTYPE html>


<head>
	<title>UserLearning Pbc Project</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
</head>

<body>
	<div class="content_index">
	   <h1 align="center">Users-Groups</h1>
	   
	   <br /><br />
	   <ol>
	   <li><a href="views/list.php"><h4>List <span2>Users Table</span2> and Options / List <span2>Groups Table</span2> and Options</h4></a></li>
	   <li><a href="views/create_user.php"><h4>New <span2>User</span2> - <span> NOT YET FULLY IMPLEMENTED. </span></h4></a></li>
	   <li><a href="views/create_group.php"><h4>New <span2>Group</span2>> - <span> NOT YET FULLY IMPLEMENTED.</span></h4></a></li>
	   <li><a href="views/create_object.php"><h4>Create a new <span2>EMPTY</span2> object (User or Group)</h4></a></li>
	   <li><a href="views/view_user.php"><h4><span2>View</span2> a unique <span2>USER</span2> by it's id</h4></a></li>
	   <li><a href="views/view_group.php"><h4><span2>View</span2> a unique <span2>Group</span2> by it's id </h4></a></li>
	   <li><a href="models/edit.php"><h4>Edit a unique object (User or Grp) - <span> NOT YET FULLY IMPLEMENTED.</span></h4></a></li>
	   <li><a href="views/assign.php"><h3>Assign a user to a group!</h3></a></li>
	   </ol>
   </div>
</body>

</html>


<?php
echo "<pre>";
//Including/requireing necessary files.
require_once 'controllers/crud.php';
require_once 'controllers/user.php';
require_once 'controllers/group.php';
require_once 'controllers/database.php';

$user = new User();
$testgrp = new Group();

$user_params = array(
	'id' => '1211',
	'name' => 'User 14',
	'password' => '123456',
	'details' => array('det1', 'det2'),
	);
$group_params = array(
	'id' => '13',
	'name'=> 'Group z3',
	'special_key' => 'zzzeefdsfdsefffaaa',
	);
$update_params_ = array(
	'id' => '60',
 	'name' => 'User Update WORKS',
 	'password' => '123442342342356',
 	'details' => array('det33231', 'det332'),
 	'group_id' => '141',
	);

//$asd = $user->verify_name_exists_in_table('asd');
//var_dump($asd);
$ddd = new  User();

$a = $ddd->verify_username_exists_in_table('asd');

print_r($a);
var_dump($a);
?>