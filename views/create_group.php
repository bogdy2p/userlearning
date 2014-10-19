<?php
 require_once('../controllers/crud.php');
 require_once('../controllers/user.php');
 require_once('../controllers/group.php');
?>

<!DOCTYPE html>
<head>
	<title>Create  - UserLearning Pbc Project</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css"> 
</head>
<body>
	<div class ="content">
		<a href="/user"><h4 align="center">Go back.</h4></a>	

			<form class="form" id="asd" action="create_group.php" method="post">

				
				<label>group name</label><br />
				<input name="name"  type="text"  placeholder="group name"> <br />
				<label>special key</label><br />
				<input name="special key"  type="text"  placeholder="special key"> <br />
				
				<button type="submit" class="button">Create</button>

			</form>
 	</div>
</body>

</html>


<!-- FUNCTIONALITY -->

<?php 

		$groups = new Group();
		$group = array();
		$most_recent_group_id = $groups->grab_latest_group_id();
		$_POST['id'] = $most_recent_group_id + 1;		
		$group['id'] = $_POST['id'];
		
		// IF isset , if not , set them to null !
		if(isset($_POST['name'])){ $group['name'] = $_POST['name']; }else{ $group['name'] = NULL; }
		if(isset($_POST['special_key'])){ $group['special_key'] = $_POST['special_key']; }else{ $group['special_key'] = NULL; }

		if(isset($group['id']) && isset($group['name']) && isset($group['special_key'])) {
			$update_params_array = $group;
			$groups->create($group);
			$groups->update($group['id'],'groups',$update_params_array);
			echo "Group succesfully created and updated.";
			header("Location: /user/views/list.php");
			die();
		}
	
?>