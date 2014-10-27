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
				//LOGGING OF THE ACTION !
					$log_message = 'User '.$user["id"].' named '.$user["name"].' succesfully created.';
					$log = new Log();
					$log->create_log('user.php | '.__FUNCTION__,$log_message);
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

	function update_detail_type_name($old_name,$new_name){
		// //LOGGING OF THE ACTION !
		$log_message = 'Updated detail ['.$old_name.'] renamed it to ['.$new_name.']';
		$log = new Log();
		$log->create_log('user.php | '.__FUNCTION__,$log_message);
		//Grab the id by the old name
		return Crud::update_detail_type_name($old_name,$new_name);
		
		
	}

}

?>