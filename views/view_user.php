<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>

<div class ="container">
	<div class="row"><?php print_sitewide_menu();?></div>

	<div class="row">
		<div class="col-xs-4 col-md-4"></div>
		<div class="col-xs-4 col-md-4">
	
			<form class="form" id="viewuser" action="view_user.php" method="post"><br /><br />
			<select name="id" id="id" form="viewuser">
							 <?php 
							 	$users = new User();
							 	$id_array = $users->grab_all_user_ids();
							 	foreach ($id_array as $id => $value) {
							 		echo "<option value=\"{$value}\">{$value} - {$users->get_name_by_id($value)}</option>";
							 	}
							 ?>
			</select>
					<br /><br />
				<button type="submit" class="button">View User's Data</button>
			</form>

		</div>
		<div class="col-xs-4 col-md-4"></div>

			<div class="row"></div>
			<div class="row"></div>
			<div class="row"></div>
			<div class="row"></div>
			<div class="row"></div>

	<div class="row">

<?php 
	if(isset($_GET['id']) && ($_GET['id'] > 0)){
			$_POST['id'] = $_GET['id'];
	}
	if(isset($_POST['id']) && ($_POST['id'] > 0)){

		print_user_information_table_html($_POST['id']);
		print_user_details_information_table_html($_POST['id']);
	}

?>


<?php 
/**********************************************************************************/
/*********************PRINT THE USER BASIC INFORMATION TABLE***********************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
	function print_user_information_table_html($user_id){
		print_user_information_table_header($user_id);
		$user = new User();
		$user->get_user_object_by_id($user_id);
		$groups_array = $user->get_number_of_groups_for_a_user($user_id);
		print_user_information_table_content($user,$groups_array);
		print_user_information_table_footer();
	}

	function print_user_information_table_header($user_id){
		echo '<div class="col-xs-12 col-md-12">';
		echo '<h3> Userdata for user : '.$user_id.'</h3>';
		echo '<table class="table table-bordered">';
			echo '<th class="col-xs-1 col-md-1">ID</th>';
			echo '<th class="col-xs-3 col-md-2">Name</th>';
			echo '<th class="col-xs-3 col-md-3">Password</th>';
			echo '<th class="col-xs-5 col-md-5">Is member of</th>';
	}

	function print_user_information_table_content($user,$groups_array){
			echo '<tr>';
		    echo '<td>'. $user->id .'</td>';
			echo '<td>'. $user->name . '</td>';
			echo '<td>'. $user->password . '</td>';
			echo'<td>'.  implode(" / ",$groups_array) . '</td>';	
		    echo '</tr>';
	}

	function print_user_information_table_footer(){
		echo '</table></div>';
	}
/**********************************************************************************/
/*********************PRINT THE USER DETAILS ATTACHED TABLE************************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/

	function print_user_details_information_table_html($user_id){
			print_user_details_information_table_header();
			$user = new User();
			$user_details_ids = $user->get_user_details_array($user_id);
			print_user_details_information_table_content($user_details_ids);
			print_user_details_information_table_footer();
	}

	function print_user_details_information_table_header(){
		echo "<h3>The details set for this user are :</h3>";
        echo "<br />";
		echo '<div class="col-xs-2 col-md-2">';
        echo '<table class="table table-bordered">';
	}

	function print_user_details_information_table_content($user_details_ids){
			$user = new User();
		foreach ($user_details_ids as $user_detail_id) {
			$detail = $user->get_detail_data_by_detail_id($user_detail_id);
			echo '<th class="col-xs-2 col-md-2">User '.$_POST['id'] . '\'s ' . $detail['type'] .'</th>';							
			echo '<tr><td class="col-xs-2 col-md-2">'. $detail['value'] .'</td></tr>';
		}  
	}

	function print_user_details_information_table_footer(){
		echo '</table>';
		echo '</div>'; 
	}

?>
</div>
<?php include_page_footer_content(); ?>
</body>

<html>

