<?php 
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<?php 	
verification($_GET);
//FLOW DIAGRAM//
//
//	verificam daca este setat get-ul.
//	
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

function create_user_update_details_array($post_array){
	$user_update_details = array(
		'id' => $post_array['id'],
		'name' => $post_array['name'],
		'password' => md5($post_array['password']),
		);
		return $user_update_details;
}






function verification($get) {
	
	if(isset($get) && ($get != NULL)) //CONDITIE ABSOLUT NECESARA PENTRU A ACCESA PAGINA ?!
		{ 
			//$_GET['id'] = $get['id'];	// Remove this ! 		
			$user = new User(); //Call User Class
			$user->get_user_object_by_id($get['id']); //Fetch the user object from the database by the ID !!
			$old_pass = $user->password; // Grab the old password from the object
//			var_dump($the_old_pass);
			$old_name = $user->name;

			//Setam Post de id sa corespunda cu get de id.
			$_POST['id'] = $get['id'];
						
					//DACA EXISTA POST[OLD PASSWORD]
					if(isset($_POST['old_password'])) { 
						//Daca post de old password e cel din database 
						if(md5($_POST['old_password']) == $old_pass){
							// daca post de noua parola e egal cu post de confirmare noua parola

								if($_POST['password'] == $_POST['pass_conf']) {

									//Create the update details array using the post data.																		
									$user_update_details = create_user_update_details_array($_POST);
									//Update the user details correspondingly
									$update = $user->update($user_update_details['id'],'users',$user_update_details);
									//Delete all the mapping for this user			
									$delete_current_mapping = $user->delete_all_mapping_for_user($get['id']);
									
									//****************************************************************************************//

									//Get an array of checked groups in the form
									$name_of_groups_checked_in_form = get_groups_checked_in_form();
									//Create an array of the id's we need to assign !
									//THIS SHOULD BE A SEPARATE FUNCTION THAT RETURNS THE GROUP_IDS_CHECKED_IN_FORM

									$group_ids_checked_in_form = array();
									echo 'Untill here';
									 foreach ($name_of_groups_checked_in_form as $key => $value) {
									// 	//echo $key;
									 	$group_ids_checked_in_form[] = $user->get_groupid_by_groupname($value);	
									 }
									echo 'Untill here2';
									$group_ids_checked_array = $group_ids_checked_in_form;
									//$group_ids_checked_array = array(0,1);
									print_r($group_ids_checked_array);
									//**************************************************************************************////
									//Apply new mapping using the new values from the form !!!!
									foreach ($group_ids_checked_array as $group_id_checked) {
										$user->assign_user_to_group($get['id'],$group_id_checked);
									}
									echo 'Untill here3';
									header("Location: /user/views/view_list.php");		
									//die();						
								
								}else{
									print_r("The passwords you entered do not match.");
								}
						} //if(md5($_POST['old_password']) == $the_old_pass)
						 else  {
						 	echo " <br />error. <br />";
							print_r($old_pass." <= the old pass |||| ".$_POST['old_password']." <= post de old pass <br />");
							print_r("<br />".$old_pass." <= the old pass |||| ".md5($_POST['old_password'])." <= md5 de post de old pass <br />");
								}
					}
					//DACA NU EXISTA POST[OLD PASSWORD]
					else{
						echo "form not submitted yet / post old password not set ";
					}
		}else
		//DACA EXISTA GET-UL (accesare link fara id)
		{
			die("There is no get. Or it's NULL // 404 Redirect Here !");
		}
} // SFARSIT FUNCTIE verification
		
// function get_group_ids_checked_in_form(){
// 	$name_of_groups_checked_in_form = get_groups_checked_in_form();
// 	//print_r($name_of_groups_checked_in_form);
// 	$array_of_group_ids_checked_in_form = array();
// 		foreach ($name_of_groups_checked_in_form as $key => $value) {
// 			$array_of_group_ids_checked_in_form[] = $user->get_groupid_by_groupname($value);	
// 			print_r($value);
// 		}
// 	return $array_of_group_ids_checked_in_form;
// }


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