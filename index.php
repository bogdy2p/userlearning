<?php

echo "<pre>";
//Including/requireing necessary files.
require_once 'classes/crud.php';
require_once 'classes/user.php';
require_once 'classes/group.php';
require_once 'classes/database.php';


//$object_id = '2';

$user = new User();
$testgrp = new Group();

//Verify user existence (uid)
//$exists = $user->verify_user_existence('2','22');

// $exists2 = $user->verify_object_exists($object_id,$table_name);

// if($exists2){
// 	echo "Object with id = " .$object_id ." exists in table " . $table_name ." ! ";
// }else{
// 	echo "THERE IS NO Object with id = " .$object_id ." in table named : " . $table_name ." ! ";
// }
//var_dump($exists2);

$user_params6 = array(
	'id' => '1211',
	'username' => 'User 14',
	'password' => '123456',
	'details' => array('det1', 'det2'),
	);
/// Add a new object if not exists already in database.
//$test = $user->insert_user_into_db($user_params6);
$group_params = array(
	'id' => '13',
	'name'=> 'Group 3',
	'special_key' => 'zzzeefdsfdsefffaaa',
	);
//$azd = $testgrp->insert_group_into_db($group_params);

$params_array = array(
	'id' => '60',
 	'username' => 'User 4324234231',
 	'password' => '123442342342356',
 	'details' => array('det33231', 'det332'),
 	'group_id' => '141',
	);


$user->db_delete('59','users');
//$test_update = $user->user_db_update($params_array['id'],'users',$params_array);


//Instantiating classes
// $user = new User();
// $group = new Group();
//Defining parameter arrays for 3 users.
// $user_params = array(
// 	'id' => '1',
// 	'username' => 'User 1',
// 	'password' => '123456',
// 	'details' => array('det1', 'det2'),
// 	);
// $user_params2 = array(
// 	'id' => '2',
// 	'username' => 'User 2',
// 	'password' => '14346',
// 	'details' => array('det3', 'det4'),
// 	);
// $user_params3 = array(
// 	'id' => '3',
// 	'username' => 'User 3',
// 	'password' => '1253456',
// 	'details' => array('det5', 'det6'),
// 	);

//Creating the first user
// $user->create($user_params);
// //Creating the second user
// $user->create($user_params2);
// //Creating the third user
// $user->create($user_params3);

// //Grabbing user objects data after creating them
// $userData = $user->getUserData('1');
// $userData2 = $user->getUserData('2');
// $userData3 = $user->getUserData('3');

// //Creating 3 groups
// $group->create(array('id' => '11', 'name'=> 'Group 1', 'special_key' => 'asdfsfd'));
// $group->create(array('id' => '12', 'name'=> 'Group 2', 'special_key' => 'zzzeeefffaaa'));
// $group->create(array('id' => '13', 'name'=> 'Group 3', 'special_key' => 'zzzeefdsfdsefffaaa'));
// //Grabbing group objects data after creating them
// $group_11_Details = $group->getGroupDetails('11');
// $group_12_details = $group->getGroupDetails('12');
// $group_13_details = $group->getGroupDetails('13');

// //Set User 1 to have group 11
// $group->setUserGroup($group_11_Details['id'], $userData['id']);
// //Set USER 2 to have group 12
// $group->setUserGroup($group_12_details['id'], $userData2['id']);
// //Set USER 3 to have group 12
// $group->setUserGroup($group_12_details['id'], $userData3['id']);
// //Change Group thirteen's name ;)
// $group->setGroupName('13','ThisIsGroupThirteen');

//$group->delete('group','12');
//print_r($user->getAllUsers());
//print_r($group->getAllGroups());

			// //Printing all the users associated to the group with id "12"
			// print_r("\t\t\t All users from group 12 are : <br /> <br />");
			// print_r($group->getAllUsersFromGroup('12'));
			// //Printing all the users associated to the group with id "11"
			// print_r("\t\t\t All users from group 11 are : <br /> <br />");
			// print_r($group->getAllUsersFromGroup('11'));
			// //Printing all the users associated to the group with id "11"
			// print_r("\t\t\t All users from group 13 are : <br /> <br />");
			// print_r($group->getAllUsersFromGroup('13'));

//session_destroy();
echo "<br />";
die('---');

?>