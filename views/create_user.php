<?php
 require_once '../models/user_list.php';
?>
<!DOCTYPE html>
<head>
	<title>Create - UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>
<body>
	<div class ="container">
	<div class="row"><?php print_sitewide_menu();?></div>
			
			<div class="row">
				<div class="col-xs-4 col-md-4"></div>
				<div class="col-xs-4 col-md-4">
					<br /><br />
					<form class="form" id="asd" action="create_user.php" method="post">
						<label>name</label><br />
						<input name="name"  type="text"  placeholder="enter desired name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"> <br />
						<label>password</label><br />
						<input name="password"  type="text"  placeholder="enter password" value=""> <br />
						<label>confirm password</label><br />
						<input name="pass_conf" type="text"  placeholder="confirm password" value=""> <br />
						<?php $user = new User();	$user->add_dynamic_user_detail_form_inputs(); ?>
						<br />
						<button type="submit" class="btn btn-success">Create User</button>
					</form>
				</div>
				<div class="col-xs-4 col-md-4"></div>
			
			</div> <!-- <div class="row"> -->
 	</div>
 	<?php include_page_footer_content(); ?>
</body>
</html>
<!-- FUNCTIONALITY -->
<?php 
		$users = new User();
		$users->create_user_with_data();
?>