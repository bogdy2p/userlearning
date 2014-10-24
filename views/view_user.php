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

	<div class="row">

<?php 
	if(isset($_GET['id']) && ($_GET['id'] > 0)){
			$_POST['id'] = $_GET['id'];
	}
	if(isset($_POST['id']) && ($_POST['id'] > 0)){
		$user = new User();
		$user->print_user_information_table_html($_POST['id']);
		$user->print_user_details_information_table_html($_POST['id']);
	}
?>

</div>
<?php include_page_footer_content(); ?>
</body>

<html>

