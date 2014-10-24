<?php 

class Group extends Crud {
	//Constructor function for class group.
	function __construct(){
		parent::__construct('group');
	}
	//GROUP CREATE`
	function create($array,$table = 'groups'){
		//return parent::create($array,$table);
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
								$sql = $this->db->prepare("insert into groups (id) VALUES (:object_id)");
								$sql->execute(array(':object_id' => $this->id));
							}
							else { 	die("There already is a object called {$array['name']} into table {$table}"); 
								 }
							echo "A new ". $table . " object ( ". $this->id ."  ) succesfully created. <br />";
					}
			else { die ("ERR : Object with id = ". $array['id'] ." allready exists in ". $table); 
				 }
		}
	}

	function create_group_with_data(){
		//Asssignments
		$group = new Group();
		$group = array();
		$most_recent_group_id = Self::grab_latest_group_id();
		$_POST['id'] = $most_recent_group_id + 1;
		$group['id'] = $_POST['id'];
		//Checks || Resetting to null;
		if(isset($_POST['name'])){ $group['name'] = $_POST['name']; }else{ $group['name'] = NULL; }
		if(isset($_POST['special_key'])){ $group['special_key'] = $_POST['special_key']; }else{ $group['special_key'] = NULL; }

		if(isset($group['id']) && isset($group['name']) && isset($group['special_key'])) {
			$update_params_array = $group;
			Self::create($group);
			Self::update($group['id'],'groups',$update_params_array);
			$log_message = 'Group '.$group['id'].' named '.$group['name'].' succesfully created.';
			$log = new Log();
			$log->log('group.php | create_group_with_data',$log_message);
			//echo "Group succesfully created and updated.";
			/////////////
			//A LOGGING FUNCTION SHOULD BE CREATED HERE  that adds a log into the db 
			/////////////
			header("Location: /user/views/view_list.php");
			die();
		}
	}


	function list_groups($table_name = 'groups'){
		return parent::read($table_name);
	}
	//GROUP READ
	function list_all_groups($table_name = 'groups'){
		$statement = parent::read($table_name);
					echo '<table class="default_css_table">';
					echo '<th>ID</th>';
					echo '<th>Group Name</th>';
					echo '<th>Special Key</th>';
		foreach ($statement as $row) {
                     echo '<tr>';
                     echo '<td>'. $row['id'] . '</td>';
					 echo '<td>'. $row['name'] . '</td>';
					 echo '<td>'. $row['special_key'] . '</td>';
                     echo '</tr>';
           }
           			echo '</table>';
	}
	//GROUP UPDATE
	function update($id, $table = 'groups', $update_params_array){
		return parent::update($id, $table, $update_params_array);
	}
	//GROUP DELETE
	function delete($id, $table = 'groups'){
		return parent::delete($id, $table);
	}
	function grab_all_group_ids($table_name ='groups') {
		$statement = parent::grab_all_ids($table_name);
		$return = array();
		foreach ($statement as $row) {
				$return[] = $row['id'];
		}
		return $return;
	}
	function get_group_object_by_id($id, $table_name = 'groups'){
		$statement = parent::grab_by_id($id,$table_name);
		foreach ($statement as $row){
			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->special_key = $row['special_key'];
		}
		return $this;
	}
	//SHOULD DEPRECATE THIS FUNCTION , THE FUNCTION OVER IT IS BETTER
	function grab_groupdata_table_by_id($id, $table_name = 'groups'){
		$statement = parent::grab_by_id($id,$table_name);
		foreach ($statement as $row){
			echo '<table class="default_css_table">';
				
				echo '<th>ID</th>';
				echo '<th>Name</th>';
				echo '<th>Special Key</th>';
				echo '<tr>';
                echo '<td>'. $row['id'] . '</td>';
				echo '<td>'. $row['name'] . '</td>';
				echo '<td>'. $row['special_key'] . '</td>';
                echo '</tr>';
            echo '</table>';
        }
	}
	function grab_latest_group_id($table_name = 'groups'){
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

	function verify_groupname_exists_in_table($name, $table_name ='groups'){
		return parent::verify_name_exists_in_table($name,$table_name);
	}

	function get_name_by_id($id,$table_name = 'groups'){
		return parent::get_name_by_id($id,$table_name);
	}
	function delete_group_mapping($id, $type = 'group_id'){
		print_r($id);
		print_r($type);
		return parent::delete_mapping($id,$type);
	}

/******************************************************************************/
/******************************************************************************/
/*******This is used into view_group to display the group data. ***************/
/******************************************************************************/
/******************************************************************************/
	function print_view_group_table_html($group){
		Self::print_view_group_table_header();
		Self::print_view_group_table_content($group);
		Self::print_view_group_table_footer();
	}
	function print_view_group_table_header(){
		echo '<br />';
		echo '<table class="table table-bordered col-xs-12 col-md-12">';
		echo '<th class="col-xs-4 col-md-4">ID</th>';
		echo '<th class="col-xs-4 col-md-4">Name</th>';
		echo '<th class="col-xs-4 col-md-4">Special Key</th>';
	}
	function print_view_group_table_content($group){
		echo '<tr>';
        echo '<td>'. $group->id .'</td>';
		echo '<td>'. $group->name . '</td>';
		echo '<td>'. $group->special_key . '</td>';
        echo '</tr>';
	}
	function print_view_group_table_footer(){
		echo '</table>';
	}
/******************************************************************************/
/******************************************************************************/

}

?>
