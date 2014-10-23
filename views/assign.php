<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>
<!DOCTYPE html>
<head>
	<title>Assign a user to a group - UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>
<div class ="container">
	<div class="row"><?php print_sitewide_menu();?></div>

	<div class="row">

			<div class="col-xs-12 col-md-4"></div>
			<div class="col-xs-12 col-md-4"><h3>Assign a user to a group</h3></div>
			<div class="col-xs-12 col-md-4"></div>
			
	</div>		

	<div class="row">
		<div class="col-xs-12 col-md-12">
		
			<form class="form" id="assign" action="assign.php" method="post"><br /><br />
				<div class="col-xs-12 col-md-4">
							<select name="user" id="user" form="assign">
										<option selected="null" value="0">Choose user</option>
										 <?php 
										 	$users = new User();
										 	$id_array = $users->grab_all_user_ids();
										 	foreach ($id_array as $id => $value) {
										 		echo "<option value=\"{$value}\">{$users->get_name_by_id($value)}</option>";
										 	}
										 ?>
							</select>
				</div>

				<div class="col-xs-12 col-md-4">
							<select name="group" id="group" form="assign">
										<option selected="0" value="0">Choose group</option>
										 <?php 
										 	$groups = new Group();
										 	$id_array = $groups->grab_all_group_ids();
										 	foreach ($id_array as $id => $value) {
										 		echo "<option value=\"{$value}\">{$groups->get_name_by_id($value)}</option>";
										 	}
										 ?>
							</select>
				</div>
				<div class="col-xs-12 col-md-4">
							<button type="submit" class="button">Assign User To Group</button>
					
				</div>	
			</form>		
		</div> <!--end of div col 12-->
	</div><!--end of div class row-->

	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>


</div>
<?php include_page_footer_content(); ?>
</body>
</html>

<!--.............................FUNCTIONALITY..................................... -->
<?php
	$user = new User();

	if (isset($_POST['user']) && isset($_POST['group']) ) {
		if(!empty($_POST['user']) && !empty($_POST['group'])) {
		
		$uid = $_POST['user'];
		$gid = $_POST['group'];

		$user->assign_user_to_group($uid,$gid);


		$test = $user->verify_existing_mapping($uid,$gid);
			if($test){
				echo "Mapping Succeded.";
				header("Location: /user/views/view_list.php");
				die();
			}else{echo "Failed to add mapping.";}
	
		}else
			{
			//Database.php - print_error_midscreen
			print_error_midscreen("One of the selected values is empty!");
			}
	}else{	
			print_error_midscreen("Please select both dropdown values!");
		 } 

?>