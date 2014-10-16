<?php
session_start();
echo "<pre>";
//Including/requireing necessary files.
require_once 'classes/crud.php';
require_once 'classes/user.php';
require_once 'classes/group.php';
require_once 'classes/database.php';


$db_id = '1';
$db_username = '1';
$object = new User();
$object->read2($db_id,$db_username);



// try{
// $dbh = new PDO('mysql:host=localhost;dbname=user_groups', 'root', '123456');
// $stmt = $dbh->prepare("SELECT * FROM users");
// if ($stmt->execute()) {
//   while ($row = $stmt->fetch()) {
//     print_r($row);
//   }
// }
// //print_r($asd);
//      $dbh = null;
// } catch (PDOException $e) {
// 	print "Error " . $e->getMessage() . "<br />";
// 	die();
// }
//Starting the session


//Create a new connection to the database
//$con=mysqli_connect("localhost","root","123456","user_groups");

// Check to see if connection works
// if (mysqli_connect_errno()) {
//   echo "Connection FAILeD !!" . mysqli_connect_error();
// }

// $test = mysqli_query($con,"INSERT INTO USERS (id, uid, username, password, details, group_id)
// VALUES ('1', 1,'username1','password1','details1',NULL)");

// if($test){
// 	echo 'succeded';
// }else{
// 	echo 'FAILED';
// }



//Instantiating classes
$user = new User();
$group = new Group();
//Defining parameter arrays for 3 users.
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
$user->create($user_params3);

//Grabbing user objects data after creating them
$userData = $user->getUserData('1');
$userData2 = $user->getUserData('2');
$userData3 = $user->getUserData('3');

//Creating 3 groups
$group->create(array('id' => '11', 'name'=> 'Group 1', 'special_key' => 'asdfsfd'));
$group->create(array('id' => '12', 'name'=> 'Group 2', 'special_key' => 'zzzeeefffaaa'));
$group->create(array('id' => '13', 'name'=> 'Group 3', 'special_key' => 'zzzeefdsfdsefffaaa'));
//Grabbing group objects data after creating them
$group_11_Details = $group->getGroupDetails('11');
$group_12_details = $group->getGroupDetails('12');
$group_13_details = $group->getGroupDetails('13');

//Set User 1 to have group 11
$group->setUserGroup($group_11_Details['id'], $userData['id']);
//Set USER 2 to have group 12
$group->setUserGroup($group_12_details['id'], $userData2['id']);
//Set USER 3 to have group 12
$group->setUserGroup($group_12_details['id'], $userData3['id']);
//Change Group thirteen's name ;)
$group->setGroupName('13','ThisIsGroupThirteen');

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

session_destroy();
die('---');

?>