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
					 				// . $user->get_name_by_id($table['user_id']) .
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$users->get_name_by_id($value)}</option>";
					 	}
					 ?>
		</select>

		<select name="group" id="group" form="assign">
					<option selected="0" value="0">Choose group</option>
					 <?php 
					 	$groups = new Group();
					 	$id_array = $groups->grab_all_group_ids();
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$groups->get_name_by_id($value)}</option>";
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
	$user = new User();

	echo "<pre>";
	if (isset($_POST['user']) && isset($_POST['group']) ) {
		if(!empty($_POST['user']) && !empty($_POST['group'])) {
		
		

		$uid = $_POST['user'];
		$gid = $_POST['group'];

		$user->assign_user_to_group($uid,$gid);


		$test = $user->verify_existing_mapping($uid,$gid);
		if($test){
			echo "Mapping Succeded.";
			header("Location: /user/views/list.php");
			die();
		}else{echo "Failed to add mapping.";}
		


		}else{
			echo "ONE OF THE SELECT VALUES IS EMPTY";
			}
	}else{
		echo "Please select both dropdown values!";
		} 

	// Verify it's been added and display a message.
	
	

?>