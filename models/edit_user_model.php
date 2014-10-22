<?php 
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php 
		if(isset($_GET['id'])){
			$user = new User(); //Call User Class
			$user->get_user_object_by_id($_GET['id']); //Fetch the user object from the database
			
		$_POST['id'] = $_GET['id'];
		$old_name = $user->name;
		
		$the_old_pass = $user->password;
		$the_user_id = $_GET['id'];
		if(isset($_POST['old_password'])){
				if(md5($_POST['old_password']) == $the_old_pass){
						if($_POST['password'] === $_POST['pass_conf']) {
							$newpass = md5($_POST['password']);
							$user_update_details = array(
								'id' => $_POST['id'],
								'name' => $_POST['name'],
								'password' => $newpass,
								);

							$update = $user->update($user_update_details['id'],'users',$user_update_details);
							$delete_current_mapping = $user->delete_all_mapping_for_user($_GET['id']);
							var_dump($delete_current_mapping);
							
							//Groups UPDATE should delete all mappings from the db
							//Should Insert new mappings from the form.
							//GROUPS UPDATE SHOULD BE DONE HERE TOO
							//After update , redirect to the list.
							//header("Location: /user/views/view_list.php");		
							die();						
						}else{
							print_r("The passwords you entered do not match.");
						}
				} else {
					print_r("The old password you entered is incorrect.");
				}
		}
}





function print_group_checkboxes_inputs(){
				$user = new User();
				$array_of_current_groups = $user->get_all_groups_for_user($_GET['id']);
				$groups_array = $user->get_all_groups_in_db();				
				$group_names = $groups_array['name'];
				$group_ids = $groups_array['id'];
				//THIS MUST BE CHANGED / IMPLEMENTED CORRECTLY
				echo '<h3>This user is a member of: </h3><br />';
				foreach ($group_names as $group_name) {
					if (in_array($group_name, $array_of_current_groups)){
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'" checked>&nbsp;';
						echo '<label>'.$group_name.'\'s</label><br />';
					}else{
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'">&nbsp;';
						echo '<label>'.$group_name.'</label><br />';
					}
				} //end foreach
	}

function print_userdata_inputs(){
		if(isset($_GET['id'])){
			$user = new User(); //Call User Class
			$user->get_user_object_by_id($_GET['id']); //Fetch the user object from the database

	echo '
		<label>Name</label><br />
		<input name="name"  type="text"  placeholder="User Name" value="'.$user->name.'"> <br />
		<label>New Password</label><br />
		<input name="password"  type="password"  placeholder="New Password" value=""><br />
		<label>Confirm New Password</label><br />
		<input name="pass_conf" type="password"  placeholder="Confirm New Password" value=""><br />
		<label>Enter current Password</label><br />
		<input name="old_password"  type="password"  placeholder="Old Password" value=""><br />
    ';
	}
}
?>