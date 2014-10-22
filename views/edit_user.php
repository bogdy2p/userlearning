<?php
 require_once('../controllers/crud.php');
 require_once('../controllers/user.php');
 require_once('../controllers/group.php');
 require_once('../models/edit_user_model.php');
?>

<!DOCTYPE html>
<head>
	<title>Edit User</title>
	<?php include_page_header_content();?>
</head>

<body>
	<div class ="container">
	<?php print_sitewide_menu();?>
		<div class="row">

			<div class="col-xs-4 col-md-4"></div>
			<div class="col-xs-4 col-md-4"><h3>Edit User <?php echo $_GET['id'];?></h3></div>
			<div class="col-xs-4 col-md-4"></div>
			
		</div>
		<div class="row">
			<!-- <div class="col-xs-12 col-md-12"> -->
				<br /><br /><br />
				<h3>Userdata : </h3>
			<form class="form" id="edituser" action="edit_user.php?id=<?php echo $the_user_id;?>&type=users" method="post">
				<div class="col-xs-6 col-md-6">
					<label>Name</label><br />
					<input name="name"  type="text"  placeholder="User Name" value="<?php if(isset($old_name)) echo $old_name;?>"> <br />
					<label>Enter OLD Password</label><br />
					<input name="old_password"  type="text"  placeholder="Old Password" value=""><br />
					<label>New Password</label><br />
					<input name="password"  type="text"  placeholder="New Password" value=""><br />
					<label>Confirm New Password</label><br />
					<input name="pass_conf" type="text"  placeholder="Confirm New Password" value="">

					<br /><br /><br /><br /><br />

				</div>
				<div class="col-xs-6 col-md-6">
<!-- CHECKBOXES FUNCTIONALITY -->
 
			<?php

			 $groups_for_curent_user = $user->get_all_groups_for_user($_GET['id']);
			 print_all_group_checkboxes($groups_for_curent_user);

			 ?>

				</div>
				<div class="col-xs-12 col-md-12">
					<div class="row">	
							<div class="col-xs-5 col-md-5"></div>
							<div class="col-xs-2 col-md-2">
								<button type="submit" class="button">Save User</button>
							</div>
							<div class="col-xs-5 col-md-5"></div>		
					</div>
				
				</div>
					
			</form>

		<!-- </div> End of div column12 before form  -->
		</div>
			<br /><br /><br /><br />
				
				<h3>Dynamically add selects with all the groups in the db.</h3>
				<h6>For the groups this user already is a member , mark the checkboxes.</h6>
				<h6>When saving , add functionality to map the user with the groups that are selected in the form</h6>
	</div>
	<?php include_page_footer_content(); ?>
</body>

</html>

