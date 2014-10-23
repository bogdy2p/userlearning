<?php //Require access to database , user , group and crud class.
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php

verify_and_add_to_db();//CALL THE VERIFY FUNCTION

function verify_and_add_to_db(){
	if(isset($_POST['detail_name'])){
		if(!empty($_POST['detail_name'])){
				$detail = $_POST['detail_name'];
				$user = new User();
				$user->add_user_detail_type($detail);
				header("Location: /user/views/view_detail_types.php");
				die();
		}else{
			echo "<h3>You cannot create a empty detail!<br /></h3>";
			echo '<h3><a href="/user/views/view_detail_types.php">Go Back</a></h3>';
			die();
		}
	}else{/*echo "NO POST";*/}
} /*end*/

function print_user_details_table_html($user_details_array){
	print_user_details_table_header();
	print_user_details_table_content($user_details_array);
	print_user_details_table_footer();
}

function print_user_details_table_header(){
	echo '<table class="table table-bordered">';
	echo '<th> Current User Details Set</th>';
	echo '<th> Edit</th>';
	echo '<th> Delete</th>';
}
function print_user_details_table_content($user_details_array){
	foreach ($user_details_array as $key => $value) {
		echo '<tr>';
		echo '<td>'.$value.'</td>';
		echo '<td> <a href="../views/edit_detail_types.php?name='.$value.'"><span class="glyphicon glyphicon-edit"></span></a>  </td>';
		echo '<td> <a href="../models/delete.php/?id='.$value.'&type=detail"><span class="glyphicon glyphicon-remove spanred"></span></a> </td>';
		echo '</tr>';
	}
}
function print_user_details_table_footer(){
	echo '</table>';
}

function print_add_new_user_detail_form(){
	echo '
			<form class="form" id="add_new_detail_form" action="../models/detail_types_edit.php" method="post">
				<label>Add Detail Type</label><br />
					<input name="detail_name"  type="text"  placeholder="new detail type"> <br />
					<br />
					<button type="submit" class="btn btn-success">Add new Detail</button>
			</form>
	';
}
?>