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

			<form class="form" id="edituser" action="edit_user.php?id=<?php echo $the_user_id;?>&type=users" method="post">

				<label>Name</label><br />
				<input name="name"  type="text"  placeholder="User Name" value="<?php if(isset($old_name)) echo $old_name;?>"> <br />
				<label>Enter OLD Password</label><br />
				<input name="old_password"  type="text"  placeholder="Old Password" value=""><br />
				<label>New Password</label><br />
				<input name="password"  type="text"  placeholder="New Password" value=""><br />
				<label>Confirm New Password</label><br />
				<input name="pass_conf" type="text"  placeholder="Confirm New Password" value=""><br />

<!-- CHECKBOXES FUNCTIONALITY -->

			<?php 
				$user = new User();
				$groups_array = $user->get_all_groups_in_db();				
				$group_names = $groups_array['name'];
				$group_ids = $groups_array['id'];
				$user_is_a_member_of_this_group = false;
				echo '<br />';
				foreach ($group_names as $group_name) {

					if ($user_is_a_member_of_this_group){
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'" checked>&nbsp;';
						echo '<label>'.$group_name.'</label><br />';
					}else{
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'">&nbsp;';
						echo '<label>'.$group_name.'</label><br />';
					}
				} //end foreach
				
			?>
				<button type="submit" class="button">Save User</button>
			</form>

			<br />
				<pre>
				<h5>Dynamically add selects with all the groups in the db.</h5>
				<h5>For the groups this user already is a member , mark the checkboxes.</h5>
				<h5>When saving , add functionality to map the user with the groups that are selected in the form</h5>
	</div>
	<?php include_page_footer_content(); ?>
</body>

</html>

