<?php
 require_once('../controllers/crud.php');
 require_once('../controllers/user.php');
 require_once('../controllers/group.php');
?>

<!DOCTYPE html>
<head>
	<title>Create  - UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>
<body>
	<div class ="content">
	<?php print_sitewide_menu();?>
			

			<form class="form" id="asd" action="create_user.php" method="post">
				<?php
				 $_POST['phone'] = 'HAHAHAHA';
				 $_POST['adress'] = 'hardcodedadress';
				?>
				<label>name</label><br />
				<input name="name"  type="text"  placeholder="enter desired name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"> <br />
				<label>password</label><br />
				<input name="password"  type="text"  placeholder="enter password" value=""> <br />
				<label>confirm password</label><br />
				<input name="pass_conf" type="text"  placeholder="confirm password" value=""> <br />
				<label>details array</label><br />
				<input name="details"   type="text"  placeholder="enter details" value="<?php if(isset($_POST['details'])) echo $_POST['details'];?>"> <br />
				<?php 
				$user = new User();
				$user->add_dynamic_user_detail_form_inputs();
				//DINAMICALLY ADD A INPUT FOR EACH DETAIL TYPE IN USER_DETAIL_TYPES ARRAY



				?>

				<br />
				<button type="submit" class="btn btn-success">Create User</button>

			</form>
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
		if(isset($_POST['details'])){ $user['details'][] = $_POST['details']; }else{ $user['details'] = NULL; }

		//removed when we removed from the table the group id.
		//if(isset($_POST['group_id'])){ $user['group_id'] = $_POST['group_id']; }else{ $user['group_id'] = 9999; }

		if(isset($user['id']) && isset($user['name']) && isset($user['password']) && isset($user['details'])) {
			// VERIFY PASSWORD MATCHING
			if($_POST['password'] === $_POST['pass_conf']){

				//PASS ENCRYPTION
				$enc_pass = md5($_POST['password']);
				$user['password'] = $enc_pass;
				$update_params_array = $user;
					
				$asd = $users->create($user);
						//INSERT DETAILS INTO SEPARATE TABLE
						if(isset($_POST['details'])){
							$details = $_POST['details'];
							$detail = explode(";", $details);
							//print_r($detail);
							foreach ($detail as $key => $value) {
								//if(!is_null($value)){
								$users->add_user_detail($user['id'],$value);
								//}
							}
						}
				$asd2 = $users->update($user['id'],'users',$update_params_array);
				//print_r($asd2);
				header("Location: /user/views/list.php");
				die();
			}
			else{
				echo "ERROR : Passwords do not match ! Please re-enter !";
			}
		}
		 else{
		 	//die ("Some Last strange error into create_user.php");
		 }
	


?>