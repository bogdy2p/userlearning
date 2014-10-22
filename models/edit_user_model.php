<?php 
	function asd(){

	}
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

<?php 

// This function should get an array of the curent user's groups , and check the groups the user already is memberr of
// A function that returns all the current groups of an user should be implemented.
	function print_all_group_checkboxes($array_of_current_groups){
				$user = new User();
				$groups_array = $user->get_all_groups_in_db();				
				$group_names = $groups_array['name'];
				$group_ids = $groups_array['id'];
				//THIS MUST BE CHANGED / IMPLEMENTED CORRECTLY
				
				echo '<h3>Groups for this user: </h3><br />';
				foreach ($group_names as $group_name) {
					if (in_array($group_name, $array_of_current_groups)){
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'" checked>&nbsp;';
						echo '<label>'.$group_name.'</label><br />';
					}else{
						echo '<input name="'.$group_name.'" type="checkbox" value="'.$group_name.'">&nbsp;';
						echo '<label>'.$group_name.'</label><br />';
					}
				} //end foreach
	}
?>