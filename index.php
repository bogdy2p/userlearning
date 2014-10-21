<?php 
require_once 'controllers/crud.php';
require_once 'controllers/user.php';
require_once 'controllers/group.php';
require_once 'controllers/database.php';
?>

<!DOCTYPE html>


<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
	
</head>

<body>
	<div class="container">

		<div class="row">
		<?php print_sitewide_menu();?>
		</div>
			<!-- echo "<td><a class=\"btn btn-danger\" href=\"../models/delete.php/?id={$individual_user['id']}&type={$type}\">Delete</td>"; -->

		
		<div class="row">
			 <div class="col-xs-4 col-md-4"></div>
  			 <div class="col-xs-4 col-md-4"><h1>Users-Groups</h1></div>
  			 <div class="col-xs-4 col-md-4"></div>
  			 
  		</div>
	  

	  	<div class="row">
	  		
	  	Print something funny here.?


	  	</div>
	   <!-- <ol> 
	   		<li><a href="views/list.php"><dl><dt>View All Tables</dt></a><dd>~ not yet fully implemented ~</dd></dl></li>
	   		<li><a href="views/create_user.php"><dl><dt>Add New User</dt></a><dd>~ create a new user</dd></dl></li>
	   		<li><a href="views/create_group.php"><dl><dt>Add New Group</dt></a><dd>~ create a new group </dd></dl></li>
	   		<li><a href="views/assign.php"><dl><dt>Assign User To Group</dt></a><dd>~ map an existing user to an existing group</dd></dl></li>
	   		<li><a href="views/view_user.php"><dl><dt>View User by id</dt></a><dd>~ choose a user and view it's details</dd></dl></li>
	   		<li><a href="views/view_group.php"><dl><dt>View Group by id</dt></a><dd>~ choose a group id and view the group's details</dd></dl></li>
	   </ol> -->
   </div>
    <!-- <h4>Add New <span2>User</span2> - <span> Tested. Working </span></h4></a></li> -->
	   <!-- <li><a href="views/create_group.php"><h4>Add New <span2>Group</span2> - <span> Tested. Working </span></h4></a></li> -->
	   <!-- <li><a href="views/view_user.php"><h4><span2>View USER</span2> by  id</h4></a></li> -->
	   <!-- <li><a href="views/view_group.php"><h4><span2>View Group</span2> by  id </h4></a></li> -->
	   <!--<li><a href="models/404.php"><h4>Edit a unique object (User or Grp) - <span> REPLACED WITH EDIT BY ID </span></h4></a></li>-->
	   <!-- <li><a href="views/assign.php"><h4><span2>Assign a user to a group!</span2> </h4></a></li> -->
	   <!--<li><a href="views/create_object.php"><h4><span2>WILL DEPRECATE !!</span2> Create a new <span2>EMPTY</span2> object (User or Group) </h4></a></li>-->
   <?php include_page_footer_content(); ?>
</body>

</html>




<?php
echo "<pre>";


$user = new User();
$testgrp = new Group();

//$asd = $user->get_user_details_array('1');
//print_r($asd);


//$asd = $user->get_detail_by_detail_id('91');
//$asd = $user->check_detail_exists('detail1','2');
//$e = $user->add_user_detail('2','detaliu');
//var_dump($asd);

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