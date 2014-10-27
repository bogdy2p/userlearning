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
						<?php 
						$user = new User();
						$user->add_dynamic_user_detail_form_inputs();
						?>
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
		/// Call create user // STORE THE ID into an variable , then call UPDATE USER for that id.
		$users = new User();
		$user = array();
		$most_recent_user_id = $users->grab_latest_user_id();
		$_POST['id'] = $most_recent_user_id + 1;
		$user['id'] = $_POST['id'];
		
		// IF isset , if not , set them to null !
		if(isset($_POST['name'])){ $user['name'] = $_POST['name']; }else{ $user['name'] = NULL; }
		if(isset($_POST['password'])){ $user['password'] = $_POST['password']; }else{ $user['password'] = NULL; }
		if(isset($_POST['pass_conf'])){ $user['pass_conf'] = $_POST['pass_conf']; }else{ $user['pass_conf'] = NULL; }

		if(isset($user['id']) && isset($user['name']) && isset($user['password'])) {
			// VERIFY PASSWORD MATCHING
			if($_POST['password'] === $_POST['pass_conf']){

				//PASS ENCRYPTION
				$enc_pass = md5($_POST['password']);
				$user['password'] = $enc_pass;
				$update_params_array = $user;
				//Create the user in the users table
				$asd = $users->create($user);
				//INSERT DETAILS INTO SEPARATE TABLE
						//Grab detail Types
						$detail_types = $users->get_all_user_detail_types();
						//For each detail type , check if POST is set , and if it's set , try setting the detail in the detail table.
						foreach ($detail_types as $detail_type) {
								if(isset($_POST[$detail_type])){
									$users->add_user_detail_with_type($user['id'],$detail_type,$_POST[$detail_type]);
								}
						}
				$asd2 = $users->update($user['id'],'users',$update_params_array);
				
				//header("Location: /user/views/view_list.php");
				die();
			}
			else{
				echo "ERROR : Passwords do not match ! Please re-enter !";
			}
		}
		 else{ //die ("Some Last strange error into create_user.php");
		 	 }
	


?>