<?php

require_once 'classes/crud.php';
require_once 'classes/user.php';
require_once 'classes/group.php';


for ($i=1;$i<10;$i++){

$vasile[$i] = array(
	'id' => $i,
	'username' => 'vasileusername'.$i,
	'password' => 'vasilepassword',
	'details' => 'vasiledetails',
	);
$user[$i] = new User();

$user[$i]->create($vasile[$i]);
}
//$user = new User('aa');
//$group = new Group();

echo "<pre>";
print_r($user);

//var_dump($user);
$user[3]->delete($vasile[3]);

$user[3]->setUsername(3,'ion');

print_r($user);

//print_r($user->read($vasile));

?>