<?php
session_start();
echo "<pre>";
require_once 'classes/crud.php';
require_once 'classes/user.php';
require_once 'classes/group.php';

$user = new User();
$params = array(
	'id' => '1',
	'username' => 'User 1',
	'password' => '123456',
	'details' => array('det1', 'det2'),
	);

$user->create($params);
$userData = $user->getUserData('1');

$group = new Group();
$group->create(array('id' => '11', 'name'=> 'Group 1', 'special_key' => 'asdfsfd'));

$groupDetails = $group->getGroupDetails('11');
$group->setUserGroup($groupDetails['id'], $userData['id']);
//WORKS. $user->setPassword('1','vasile');
$userDetails2 = $user->getUserData('1');

print_r($userDetails2);
 
$asd = $group->getGroupDetails('11');
 
//WORKS. $group->setGroupName('11','unshpe');

$aaa = $group->getGroupDetails('11');
print_r($aaa);







//session_destroy();
die('---');

?>