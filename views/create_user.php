<?php
 require_once '../models/user_model.php';
?>
<!DOCTYPE html>
<head>
	<title>Create - UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content();?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body onload="">
	<div class ="container">
	<div class="row"><?php Crud::print_sitewide_menu();?></div>
			
			<div class="row">
				<div class="col-xs-4 col-md-4"></div>
				<div class="col-xs-4 col-md-4">
					<br /><br />

					<form class="form" id="asd" action="create_user.php" method="post">
						<label>name</label><br />
						<input name="name"  type="text"  placeholder="enter desired name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"> <br />
						<br />
						<label>password</label><br />
						<input name="password"  type="text"  placeholder="enter password" value=""> <br />
						<label>confirm password</label><br />
						<input name="pass_conf" type="text"  placeholder="confirm password" value=""> <br />
						<?php $user = new User();	$user->add_dynamic_user_detail_form_inputs(); ?>
						<br />
						<button type="submit" class="btn btn-success" id="submit">Create User</button>

					<script>
						// $.post( "create_user.php", { func: "asd" }, function( data ) {
						// 	console.log( data.name ); // John
  				// 			console.log( data.time ); // 2pm
						// 	}, "json");
					</script>

					</form>
				</div>
				<div class="col-xs-4 col-md-4"></div>
			
			</div> <!-- <div class="row"> -->
 	</div>
 	<?php Crud::include_page_footer_content(); ?>
</body>
</html>
<!-- FUNCTIONALITY -->
<?php 
		$users = new User();
		$users->create_user_with_data();
?>
