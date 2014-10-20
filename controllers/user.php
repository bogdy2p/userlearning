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

	//USER READ SHOULD BE REPLACED WITH THE FUNCTION FROM TOP because this is a MODEL not a VIEW
	//DELETABLE ALLREADY
	function list_all_users($table_name = 'users'){
		$statement = parent::read($table_name);
					echo '<table class="default_css_table">';
					echo '<th>ID</th>';
					echo '<th>Name</th>';
					echo '<th>Password</th>';
					echo '<th>Details</th>';
					echo '<th>Groups of Belonging</th>';
		foreach ($statement as $row) {
                     echo '<tr>';
                     echo '<td>'. $row['id'] . '</td>';
					 echo '<td>'. $row['name'] . '</td>';
					 echo '<td>'. $row['password'] . '</td>';
					 echo '<td>'. $row['details'] . '</td>';
					 echo '<td>ADD GROUP BELONGING HERE</td>';	
                     echo '</tr>';
           }
           			echo '</table>';
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
            $this->details = $row['details'];
     
       	    }
        return $this;
	}
	//THIS FUNCTION SHOULD BE REMOVED ! IT SHOULD BE USED INTO VIEW NOT INTO CONTROLLER
	function grab_userdata_table_by_id($id, $table_name= 'users'){
		$statement = parent::grab_by_id($id,$table_name);
		foreach ($statement as $row){
			echo '<table class="default_css_table">';
				echo '<th>ID</th>';
				echo '<th>Name</th>';
				echo '<th>Password</th>';
				echo '<th>Details</th>';
				echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
				echo '<td>'. $row['name'] . '</td>';
				echo '<td>'. $row['password'] . '</td>';
				echo '<td>'. $row['details'] . '</td>';
                echo '</tr>';
            echo '</table>';
        }
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
	function update_user_group_id($user_id,$group_id){

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

}

?>