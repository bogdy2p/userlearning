<?php //Require access to database , user , group and crud class.
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>


<?php
function test(){
echo "Included EDIT DETAIL TYPES <br />";
}









function print_user_details_table($user_details_array){
	echo '<table class="table table-bordered">';
	echo '<th> Current User Details</th>';	
	foreach ($user_details_array as $key => $value) {
		echo '<tr>';
		echo '<td>'.$value.'</td>';
		echo '</tr>';
	}
	echo '</table>';
}







?>