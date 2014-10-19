<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>
<!DOCTYPE html>
<head>
	<title>Assign a user to a group - UserLearning Pbc Project</title>

	<link rel="stylesheet" type="text/css" href="../assets/css/style.css"> 
</head>

<body>
<div class ="content">
<a href="/user"><h4 align="center">Go back.</h4></a>


	<form class="form" id="assign" action="assign.php" method="post"><br /><br />

		<select name="user" id="user" form="assign">
					<option selected="null" value="0">Choose user</option>
					 <?php 
					 	$users = new User();
					 	$id_array = $users->grab_all_user_ids();

					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$value}</option>";
					 	}
					 ?>
		</select>

		<select name="group" id="group" form="assign">
					<option selected="0" value="0">Choose group</option>
					 <?php 
					 	$groups = new Group();
					 	$id_array = $groups->grab_all_group_ids();
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$value}</option>";
					 	}
					 ?>
		</select>
		
		<button type="submit" class="button">Assign User To Group</button>
	</form>


</div>
</body>
</html>

<!--.............................FUNCTIONALITY..................................... -->
<?php
	echo "<pre>";
	if (isset($_POST['user']) && isset($_POST['group']) ) {
		if(!empty($_POST['user']) && !empty($_POST['group'])) {
			$user = new User();		
			$user_data = array();
			$user_id = $_POST['user'];
			$group_id = $_POST['group'];
			// GRAB USERDATA BY ID 
			$asd = $user->get_user_object_by_id($_POST['user']);
			// UNSET THE GROUP_ID VALUE
			unset($asd->group_id);
			// SET THE NEW GROUP ID VALUE
			$asd->group_id = $_POST['group'];
			//CREATE THE ARRAY FOR THE UPDATE DATA;
			$update_params_array = array(
				'id' => $asd->id,
				'username' => $asd->username,
				'password' => $asd->password,
				'details' => array($asd->details,),
				'group_id' => $asd->group_id,
				);
			// UPDATE THE USER TO THE DB + DISPLAY A MESSAGE 
				$test = $user->update($_POST['user'], $table = 'users',$update_params_array);
				switch (isset($asd->username) && !empty($asd->username)){
				case true:
					echo "User " . $asd->id . " ( " . $asd->username . " ) " . " now belongs to group " . $asd->group_id;
					break;
				case false:
					echo "User " . $asd->id . "   (no_name_value_for_object)  now belongs to group " . $asd->group_id;
					break;		
				}
		}
		else
			{
			echo "ONE OF THE SELECT VALUES IS EMPTY";
			}
	}
	else{
		echo "Please select both dropdown values!";
		} 
	
	

?>