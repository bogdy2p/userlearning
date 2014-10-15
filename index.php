<?php
echo "<pre>";
require_once 'classes/crud.php';
require_once 'classes/user.php';
require_once 'classes/group.php';


for ($i=1;$i<=4;$i++){

$user_array[$i] = array(
	'uid' => $i,
	'username' => 'vasileusername'.$i,
	'password' => 'vasilepassword'.$i,
	'details' => 'vasiledetails'.$i,
	'group' => NULL,
	);
$user = new User();
$user->create($user_array[$i]);

}

//print_r($user);
for ($i=1;$i<=4;$i++){
$user->update($user_array[$i]);
print_r($user);
}

$grup = new Group();

$azd = $grup->setUserGroup('4','grupu');

print_r($azd);












//var_dump($user);
//$user[3]->delete($vasile);
//$user[4]->setUsername('ion');
//$user[4]->setPassword('aaaa');
//$user[4]->setDetails('blah');
//print_r($user->read($vasile));
//$asd = $user[5]->getUserPassword(5);
//$efg = $user[5]->getUserData(5);
//print_r($efg);
//print_r($user->read($vasile));

//echo $user->getUserPassword();

?>