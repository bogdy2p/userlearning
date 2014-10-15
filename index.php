<?php
session_start();
echo "<pre>";
require_once 'classes/crud.php';
require_once 'classes/user.php';
require_once 'classes/group.php';

$user = new User();
$group = new Group();


$user_params = array(
	'id' => '1',
	'username' => 'User 1',
	'password' => '123456',
	'details' => array('det1', 'det2'),
	);
$user_params2 = array(
	'id' => '2',
	'username' => 'User 2',
	'password' => '14346',
	'details' => array('det3', 'det4'),
	);
$user_params3 = array(
	'id' => '3',
	'username' => 'User 3',
	'password' => '1253456',
	'details' => array('det5', 'det6'),
	);

//Creating the first user
$user->create($user_params);
//Creating the second user
$user->create($user_params2);
//Creating the third user
//$user->create($user_params3);

$userData = $user->getUserData('1');


$group->create(array('id' => '11', 'name'=> 'Group 1', 'special_key' => 'asdfsfd'));
$group->create(array('id' => '12', 'name'=> 'Group 2', 'special_key' => 'zzzeeefffaaa'));
$group->create(array('id' => '13', 'name'=> 'Group 3', 'special_key' => 'zzzeefdsfdsefffaaa'));

$groupDetails = $group->getGroupDetails('11');
$group->setUserGroup($groupDetails['id'], $userData['id']);
//$userDetails2 = $user->getUserData('1');

 
$asd = $group->getGroupDetails('11');

//Set group13 name to something else
$group->setGroupName('13','ThisIsGroupThirteen');

$group->delete('group','12');


print_r($user->getAllUsers());
print_r($group->getAllGroups());



session_destroy();
die('---');

?>