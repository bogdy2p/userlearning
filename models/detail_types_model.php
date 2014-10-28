<?php //Require access to database , user , group and crud class.
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php

verify_edit_and_update();//CALL THE VERIFY FUNCTION FOR UPDATE
verify_and_add_to_db();//CALL THE VERIFY FUNCTION FOR CREATE

function verify_edit_and_update(){
	if(isset($_POST['new_detail_name'])){
		if(!empty($_POST['new_detail_name'])){
			$user = new User();
			$user->update_detail_type_name($_POST['old_detail_name'],$_POST['new_detail_name']);
			//MUST UPDATE IN THE OTHER TABLE EVERYWHERE WHERE DETAIL TYPE OF THIS KIND IS SET !
			$user->update_detail_types_names_in_user_groups($_POST['old_detail_name'],$_POST['new_detail_name']);
			// //LOGGING OF THE ACTION !
			// 	$log_message = 'Detail '.$_POST["old_detail_name"].' renamed to '.$_POST["new_detail_name"].' succesfully';
			// 	$log = new Log();
			// 	$log->create_log('user.php | '.__FUNCTION__,$log_message);
			header("Location: /user/views/view_detail_types.php");
			die();
		}else{
			echo '$_post is set but EMPTY';
			header("Location: /user/views/view_detail_types.php");
		}
	}else{/*echo "NO POST";*/}
}/*end verify edit*/

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
		// echo '<td> <a href="../models/delete.php/?id='.$value.'&type=detail"><span class="glyphicon glyphicon-remove spanred"></span></a> </td>';
		echo '<td><a><span onclick="confirm_detail_type_delete(\''.$value.'\')" class="glyphicon glyphicon-remove spanred pointer"></span></a></td>';
		echo '</tr>';
	}
}
function print_user_details_table_footer(){
	echo '</table>';
}

function print_add_new_user_detail_form(){
	echo '
			<form class="form" id="add_new_detail_form" action="../models/detail_types_model.php" method="post">
				<label>Add Detail Type</label><br />
					<input name="detail_name"  type="text"  placeholder="new detail type"> <br />
					<br />
					<button type="submit" class="btn btn-success">Add new Detail</button>
			</form>
	';
}

function print_edit_detail_table_html($name){
		print_edit_detail_table_header($name);
		print_edit_detail_table_content($name);
		print_edit_detail_table_footer();	
}
function print_edit_detail_table_header($name){
	echo '<div class="col-xs-12 col-md-12">
		  <h4>Current data for "'.$name.'" detail </h4>';
	echo '<table class="table table-bordered" name="view_detail">';
}
function print_edit_detail_table_content($name){
	 $user = new User();
	 $details = $user->get_detail_type_by_name($name);
	 
	 foreach ($details as $key => $value) {
	 	# code...
	 	echo '<tr>';
	 	echo '<th class="info"> Detail '.$key.'</th>';
	 	echo '<td>'.$value.'</td>';	 	
	 	echo '</tr>';
	 }
}
function print_edit_detail_table_footer(){
	echo "</table>
		  </div>";
}


function print_edit_existing_detail_form($name){
	echo '
			<form class="form" id="edit_existing_detail_form" action="../models/detail_types_model.php" method="post">
				<label>Change detail name for "'.$name.'" </label><br />
					<input name="new_detail_name"  type="text"  placeholder="change detail name"> <br />
					<input name="old_detail_name" type="hidden" value="'.$name.'">
					<br />
					<button type="submit" class="btn btn-success">Save </button>
			</form>
	';
}



?>