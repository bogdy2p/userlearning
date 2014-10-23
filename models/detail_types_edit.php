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
	echo '<th> Current User Details Set</th>';	
	foreach ($user_details_array as $key => $value) {
		echo '<tr>';
		echo '<td>'.$value.'</td>';
		echo '</tr>';
	}
	echo '</table>';
}

function print_add_new_user_detail_form(){

	echo '
			<form class="form" id="add_new_detail_form" action="detail_types_edit.php" method="post">
				<label>Add Detail Type</label><br />
					<input name="detail_name"  type="text"  placeholder="new detail type"> <br />
					<br />
					<button type="submit" class="btn btn-success">Add new Detail</button>
			</form>
	';
}





?>