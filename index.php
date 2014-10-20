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
	   <li><a href="views/list.php"><h4>View <span2>ALL Tables</span2> - <span> NOT YET FULLY IMPLEMENTED.</span></h4></a></li>
	   <li><a href="views/create_user.php"><h4>Add New <span2>User</span2> - <span> Tested. Working </span></h4></a></li>
	   <li><a href="views/create_group.php"><h4>Add New <span2>Group</span2> - <span> Tested. Working </span></h4></a></li>
	   <li><a href="views/view_user.php"><h4><span2>View USER</span2> by  id</h4></a></li>
	   <li><a href="views/view_group.php"><h4><span2>View Group</span2> by  id </h4></a></li>
	   <li><a href="models/404.php"><h4>Edit a unique object (User or Grp) - <span> REPLACED WITH EDIT BY ID </span></h4></a></li>
	   <li><a href="views/assign.php"><h3><span2>Assign a user to a group!</span2> (needs testing) and implementation of select by name </h3></a></li>
	   <!--<li><a href="views/create_object.php"><h4><span2>WILL DEPRECATE !!</span2> Create a new <span2>EMPTY</span2> object (User or Group) </h4></a></li>-->
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

$asd = $user->get_number_of_groups_for_a_user(3);
print_r($asd);



?>
<!--


// $user_params = array(
// 	'id' => '1211',
// 	'name' => 'User 14',
// 	'password' => '123456',
// 	'details' => array('det1', 'det2'),
// 	);
// $group_params = array(
// 	'id' => '13',
// 	'name'=> 'Group z3',
// 	'special_key' => 'zzzeefdsfdsefffaaa',
// 	);
// $update_params_ = array(
// 	'id' => '60',
//  	'name' => 'User Update WORKS',
//  	'password' => '123442342342356',
//  	'details' => array('det33231', 'det332'),
//  	'group_id' => '141',
// 	);

-->