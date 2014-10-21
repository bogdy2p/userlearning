<?php
 require_once('../controllers/crud.php');
 require_once('../controllers/user.php');
 require_once('../controllers/group.php');
?>

<?php 

	if(isset($_GET['id'])){
			$user = new User();
	//FETCH THE USER FROM THE DATABASE
			$user->get_user_object_by_id($_GET['id']);
			
		$_POST['id'] = $_GET['id'];
		$old_name = $user->name;
		//$old_details = $user->details;
		$the_old_pass = $user->password;
		$the_user_id = $_GET['id'];
		//VERIFY OLD PASSWORD 
		if(isset($_POST['old_password'])){ 
				
				if(md5($_POST['old_password']) == $the_old_pass){
						if($_POST['password'] === $_POST['pass_conf']) {
							$newpass = md5($_POST['password']);
							$user_update_details = array(
								'id' => $_POST['id'],
								'name' => $_POST['name'],
								'password' => $newpass,
								//'details' => array($_POST['details'],),
								);

							$update = $user->update($user_update_details['id'],'users',$user_update_details);
							
							header("Location: /user/views/view_list.php");		
							die();						
						}else{
							print_r("The passwords you entered do not match.");
						}
				} else {
					print_r("The old password you entered is incorrect.");
				}
		}
	}
?>


<!DOCTYPE html>
<head>
	<title>Edit User</title>
	<?php include_page_header_content();?>
</head>

<body>
	<div class ="content">
	<?php print_sitewide_menu();?>
		<a href="/user"><h4 align="center">Go back.</h4></a>	


			<!-- <h1> ASSIGN GROUPS BY CHECKBOX in EDIT USER</h1> -->

			<form class="form" id="edituser" action="edit_user.php?id=<?php echo $the_user_id;?>&type=users" method="post">

				<label>Name</label><br />
				<input name="name"  type="text"  placeholder="User Name" value="<?php if(isset($old_name)) echo $old_name;?>"> <br />
				<label>Enter OLD Password</label><br />
				<input name="old_password"  type="text"  placeholder="Old Password" value=""><br />
				<label>New Password</label><br />
				<input name="password"  type="text"  placeholder="New Password" value=""><br />
				<label>Confirm New Password</label><br />
				<input name="pass_conf" type="text"  placeholder="Confirm New Password" value=""><br />

				
				
			<?php 
				$user = new User();
				$groups_array = $user->get_all_groups_in_db();
				//print_r($groups_array['name']);
				

				$group_names = $groups_array['name'];
				$group_ids = $groups_array['id'];

				$user_is_a_member_of_this_group = false;

				foreach ($group_names as $group_name) {

					echo '<label>'.$group_name.'</label>';

					if ($user_is_a_member_of_this_group){
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'" checked><br />';
					}else{
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'"><br />';
					}

				}
				

				echo "<pre>";

				echo '<h2>Dynamically add selects with all the groups in the db.</h2>';
				echo '<h2>For the groups this user already is a member , mark the checkboxes.</h2>';
				echo '<h2>When saving , add functionality to map the user with the groups that are selected in the form</h2>';
				echo '<h2></h2>';
				echo '<h2></h2>';
				echo '<h2></h2>';


			?>



				<button type="submit" class="button">Save User</button>
			</form>






	</div>
	<?php include_page_footer_content(); ?>
</body>

</html>

