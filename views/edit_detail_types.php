<?php //Require access to database , user , group and crud class.
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php

$received_parameter = $_GET['name'];

 echo '<h4>you are now on edit detail types , editing <b> <spanred>'.$received_parameter.' </spanred> </b>detail.</h4>';
 echo '<h2>This is not implemented yet !</h2>';

$user = new User();
$asd = $user->get_detail_type_by_name($received_parameter);



?>