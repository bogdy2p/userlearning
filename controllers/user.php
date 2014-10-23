<?php 

class User extends Crud {
	//Constructor function for class user.
	function __construct(){
		parent::__construct('user');
	}
	//USER CREATE
	function create($array,$table = 'users'){
		return parent::create($array,$table);
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
}

?>