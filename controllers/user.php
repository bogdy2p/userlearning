<?php 

class User extends Crud {
	//Constructor function for class user.
	function __construct(){
		parent::__construct('user');
	}

	function create($array,$table = 'users'){
		$this->db = new Database();
		$this->db = $this->db->dbConnect();
		if(isset($array['id']) && ($array['id'] != 0)){
			$exists = Self::verify_object_exists($array['id'],$table);
			$already_exists = Self::verify_name_exists_in_table($array['name'],$table);
				if(!$exists){
							// IF THERE IS NO OBJECT WITH THAT USERNAME ALREADY
							if(!$already_exists){
								$object_id = $array['id'];
								$this->id = $array['id'];
								$statement = $this->db->prepare("INSERT INTO users (id) VALUES (:object_id)");
								$statement->execute(array(':object_id' => $this->id));
							}
							else { 	die("There already is a username with that name!!!"); 
								 }
							$delete_this_cuz_its_nly_for_test = 'UNNAMED';
							//LOGGING OF THE ACTION !
							$log_message = 'User '.$this->id.' named '.$array["name"].' succesfully created.';
							$log = new Log();
							$log->create_log('user.php | create',$log_message);
					}
			else { die ("ERR : Object with id = ". $array['id'] ." allready exists in ". $table); 
				 }
		}
	}

	function create_user_with_data(){
		$users = new User();
		$user = array();
		$most_recent_user_id = $users->grab_latest_user_id();
		$_POST['id'] = $most_recent_user_id + 1;
		$user['id'] = $_POST['id'];
		
		if(isset($_POST['name'])){ $user['name'] = $_POST['name']; }else{ $user['name'] = NULL; }
		if(isset($_POST['password'])){ $user['password'] = $_POST['password']; }else{ $user['password'] = NULL; }
		if(isset($_POST['pass_conf'])){ $user['pass_conf'] = $_POST['pass_conf']; }else{ $user['pass_conf'] = NULL; }

		if(isset($user['id']) && isset($user['name']) && isset($user['password'])) {
			if($_POST['password'] === $_POST['pass_conf']){

				$enc_pass = md5($_POST['password']);
				$user['password'] = $enc_pass;
				$update_params_array = $user;
				$asd = $users->create($user);
						$detail_types = $users->get_all_user_detail_types();		
						foreach ($detail_types as $detail_type) {
								if(isset($_POST[$detail_type])){
									$users->add_user_detail_with_type($user['id'],$detail_type,$_POST[$detail_type]);
								}
						}
				$asd2 = $users->update($user['id'],'users',$update_params_array);
				$users->redirect('/user/views/view_list.php');
				die();
			}
			else{
				echo "ERROR : Passwords do not match ! Please re-enter !";
			}
		}
		 else{}//die ("Some Last strange error into create_user.php");
	}



	function list_users($table_name = 'users'){
		return parent::read($table_name);
	}

	
	function grab_all_user_ids($table_name ='users') {
		$statement = parent::grab_all_ids($table_name);
		$return = array();
		foreach ($statement as $row) {
				$return[] = $row['id'];
		}
		return $return;
	}
	function get_user_object_by_id($id, $table_name = 'users'){
		$statement = parent::grab_by_id($id,$table_name);
		foreach ($statement as $row){
  			$this->id = $row['id'];
            $this->name = $row['name'];
            $this->password = $row['password'];
     
       	    }
        return $this;
	}
	
	//USER UPDATE
	function update($id, $table = 'users', $update_params_array){
		return parent::update($id, $table, $update_params_array);
	}
	//USER DELETE
	function delete($id, $table = 'users'){
		return parent::delete($id, $table);
	}
	function verify_user_existence($id, $name){
		return parent::verify_existence($id,$name);
	}
	function verify_user_exists($object_id, $table_name){
		return parent::verify_object_exists($object_id,$table_name);
	}

	function grab_latest_user_id($table_name = 'users'){
		$latest_id = '0';
		$statement = parent::grab_all_ids($table_name);
		foreach ($statement as $id) {
			if ($id > $latest_id){
				$latest_id = $id['id'];
			}else{
				return $latest_id;
			}	
		}
		return $latest_id;
	}

	function verify_username_exists_in_table($name, $table_name ='users'){
		return parent::verify_name_exists_in_table($name,$table_name);
	}

	function get_name_by_id($id,$table_name = 'users'){
		return parent::get_name_by_id($id,$table_name);
	}

	function delete_user_mapping($id, $type = 'user_id'){
		print_r($id);
		print_r($type);
		return parent::delete_mapping($id,$type);
	}

	function add_dynamic_user_detail_form_inputs(){
		$detail_types = parent::get_all_user_detail_types();
		foreach ($detail_types as $detail_type) {
			echo '<label>'.$detail_type.'</label><br />';
			echo '<input name="'.$detail_type.'" type="text" placeholder="enter '.$detail_type.'"';
				if(isset($_POST[$detail_type])){ echo 'value="'. $_POST[$detail_type] .'"> <br />'; }
				else{ echo 'value=""> <br />'; }
		}
	}

/**********************************************************************************/
/*********************PRINT THE USER BASIC INFORMATION TABLE***********************/
/**********************************************************************************/
/**********************************************************************************/
/**********************************************************************************/
	function print_user_information_table_html($user_id){
		Self::print_user_information_table_header($user_id);
		$user = new User();
		$user->get_user_object_by_id($user_id);
		$groups_array = $user->get_number_of_groups_for_a_user($user_id);
		Self::print_user_information_table_content($user,$groups_array);
		Self::print_user_information_table_footer();
	}

	function print_user_information_table_header($user_id){
		echo '<div class="col-xs-12 col-md-12">';
		echo '<h3> Userdata for user : '.$user_id.'</h3>';
		echo '<table class="table table-bordered">';
			echo '<th class="col-xs-1 col-md-1">ID</th>';
			echo '<th class="col-xs-3 col-md-2">Name</th>';
			echo '<th class="col-xs-3 col-md-3">Password</th>';
			echo '<th class="col-xs-5 col-md-5">Is member of</th>';
	}

	function print_user_information_table_content($user,$groups_array){
			echo '<tr>';
		    echo '<td>'. $user->id .'</td>';
			echo '<td>'. $user->name . '</td>';
			echo '<td>'. $user->password . '</td>';
			echo'<td>'.  implode(" / ",$groups_array) . '</td>';	
		    echo '</tr>';
	}

	function print_user_information_table_footer(){
		echo '</table></div>';
	}
/**********************************************************************************/
/**********************************************************************************/


/**********************************************************************************/
/*********************PRINT THE USER DETAILS ATTACHED TABLE************************/
/****************************used into view_user.php*******************************/
/**********************************************************************************/
/**********************************************************************************/

	function print_user_details_information_table_html($user_id){
			Self::print_user_details_information_table_header();
			$user = new User();
			$user_details_ids = $user->get_user_details_array($user_id);
			Self::print_user_details_information_table_content($user_details_ids);
			Self::print_user_details_information_table_footer();
	}

	function print_user_details_information_table_header(){
		echo "<h3>The details set for this user are :</h3>";
        echo "<br />";
		echo '<div class="col-xs-2 col-md-2">';
        echo '<table class="table table-bordered">';
	}

	function print_user_details_information_table_content($user_details_ids){
			$user = new User();
		foreach ($user_details_ids as $user_detail_id) {
			$detail = $user->get_detail_data_by_detail_id($user_detail_id);
			echo '<th class="col-xs-2 col-md-2">User '.$_POST['id'] . '\'s ' . $detail['type'] .'</th>';							
			echo '<tr><td class="col-xs-2 col-md-2">'. $detail['value'] .'</td></tr>';
		}  
	}

	function print_user_details_information_table_footer(){
		echo '</table>';
		echo '</div>'; 
	}
/**********************************************************************************/
/**********************************************************************************/

}

?>