<?php 
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php 	

//CALL THE VERIFICATION FUNCTION
verification($_GET);

function verification($get) {
	
	if(isset($get) && ($get != NULL))
		{ 
			$user = new User(); //Call User Class
			$user->get_user_object_by_id($get['id']); //Fetch the user object from the database by the ID !!
			$old_pass = $user->password; // Grab the old password from the object
			$old_name = $user->name;			
			$_POST['id'] = $get['id'];
					if(isset($_POST['old_password'])) { 
							if(!empty($_POST['old_password'])) {
									if(md5($_POST['old_password']) == $old_pass){
											if($_POST['password'] == $_POST['pass_conf']) {

												//Create the update details array using the post data.																		
												$user_update_details = create_user_update_details_array($_POST);
												//Update the user details correspondingly
												$update = $user->update($user_update_details['id'],'users',$user_update_details);
												//Delete all the mapping for this user			
												$delete_current_mapping = $user->delete_all_mapping_for_user($get['id']);
												//Get an array of checked groups in the form
												$group_ids_checked_array = get_group_ids_checked_in_form();
												//Apply new mapping using the new values from the form !!!! (Foreach in one line)
												$test = verify_update_details_for_user($get['id']);
												foreach ($group_ids_checked_array as $group_id_checked) {$user->assign_user_to_group($get['id'],$group_id_checked);}
												

												
												header("Location: /user/views/view_list.php");		
												die();						
											}else{
												print_r("The passwords you entered do not match.");
											}
									}else{
										echo "That is not the current password for this user !";
										die();
									}
							}	
							 else  {//If field OLD PASSWORD IS EMPTY
							 		$delete_current_mapping = $user->delete_all_mapping_for_user($get['id']);
							 		$group_ids_checked_array = get_group_ids_checked_in_form();
							 		$test = verify_update_details_for_user($get['id']);
							 		foreach ($group_ids_checked_array as $group_id_checked) {$user->assign_user_to_group($get['id'],$group_id_checked);}
							 		header("Location: /user/views/view_list.php");
								 	die();
									}

					}else 	{
							echo "";
							//If $_POST does not exists (@ the first page load , before submit)
							}
		}
	else{
		die("There is no get. Or it's NULL // 404 Redirect Here !");
		}
} //end Verification
	

function get_group_ids_checked_in_form(){
	$user = new User();
	$name_of_groups_array = get_groups_checked_in_form();
	$array_of_group_ids_checked = array();
		foreach ($name_of_groups_array as $key => $value) {
			$array_of_group_ids_checked[] = $user->get_groupid_by_groupname($value);	
		}
	return $array_of_group_ids_checked;
}

function get_groups_checked_in_form(){
	$user = new User();
	//Grab an the array of all groups ind the db.
	$groups_from_db = $user->get_all_groups_in_db($_GET['id']);
	$names_of_groups_from_db = $groups_from_db['name'];
	$groups_selected = array();
	foreach ($names_of_groups_from_db as $group_name) {
		if (isset($_POST[$group_name])){
			$groups_selected[] = $group_name;
		}
	}
	return $groups_selected;
}


function create_user_update_details_array($post_array){
	$user_update_details = array(
		'id' => $post_array['id'],
		'name' => $post_array['name'],
		'password' => md5($post_array['password']),
		);
		return $user_update_details;
}

function print_group_checkboxes_inputs(){
				$user = new User();
				$array_of_current_groups = $user->get_all_groups_for_user($_GET['id']);
				$groups_array = $user->get_all_groups_in_db();				
				$group_names = $groups_array['name'];
				$group_ids = $groups_array['id'];
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
		<label>Enter current Password</label><br />
		<input name="old_password"  type="password"  placeholder="Old Password" value=""><br />
		<label>New Password</label><br />
		<input name="password"  type="password"  placeholder="New Password" value=""><br />
		<label>Confirm New Password</label><br />
		<input name="pass_conf" type="password"  placeholder="Confirm New Password" value=""><br />
    ';
	}
}
 function get_userdata_details_availlable($user_id){
 		$user = new User();
 		$already_set_details = array(); 
		$all_existing_detail_types = $user->get_all_user_detail_types();
		$user_details_ids = $user->get_user_details_array($user_id);
 		foreach ($user_details_ids as $key => $value) {		
 			$already_set_details[$value] = $user->get_detail_data_by_detail_id($value)['type'];
  		}
  		foreach ($all_existing_detail_types as $individual_detail) {
  				if(in_array($individual_detail, $already_set_details)){
  					$detail_value = $user->grab_detail_value_by_type_and_id($user_id,$individual_detail);
  					print_detail_inputs_with_value($individual_detail,$detail_value);
  					$_POST[$individual_detail] = $detail_value;
  				}else{
  					print_detail_inputs_without_value($individual_detail);
  				}
  		}
}
function print_detail_inputs_with_value($type,$detail){
		echo '
			<label>'.$type.'</label></br>
			<input name="'.$type.'" type="text" placeholder="" value="'.$detail.'"></br>
			';
}
function print_detail_inputs_without_value($detail){
		echo '
			<label>'.$detail.'</label></br>
			<input name="'.$detail.'" type="text" placeholder="" value=""></br>
			';
}

function verify_update_details_for_user($user_id){
	// 1 . Grab all detail types array.
	// 2 . For each detail type , check POST [ that detail ] is set and is not null
	// 3 . Call the update function that UPDATES the values in the database with the values from the POST (input)
	$user = new User();
	$all_existing_detail_types = $user->get_all_user_detail_types();
	foreach ($all_existing_detail_types as $detail) {
		
		if(isset($_POST[$detail]) && (!empty($_POST[$detail]))){
			$detail_pair_exists = $user->check_detail_pair_exists($user_id,$detail);
			if (!$detail_pair_exists){
				$create_a_new = $user->add_user_detail_with_type($user_id,$detail,$_POST[$detail]);
			}else{}
			$user->update_user_details_for_user($user_id,$detail,$_POST[$detail]);
		}
	}
}

?>