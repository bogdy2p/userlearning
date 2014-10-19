<?php
 require_once('classes/crud.php');
 require_once('classes/user.php');
 require_once('classes/group.php');
?>
<!DOCTYPE html>
<head>
	<title>Create a new Object - UserLearning Pbc Project</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
	<div class ="content">
		<a href="/user"><h4 align="center">Go back.</h4></a>		
			<form class="form" id="asd" action="create_object.php" method="post">
				<input name="id" type="text"  placeholder="enter an id here !"> <br />
				<select name="name" form="asd">
 					 <option value="users">User</option>
 					 <option value="groups">Group</option>
				</select>	
				<button type="submit" class="button">Create</button>
			</form>
 	</div>
</body>

</html>

<?php 
    if(isset($_POST['id']) && isset($_POST['name'])){
	    $object_id_from_form = $_POST['id'];
    	$name_from_form = $_POST['name'];
    	$testdata = array(
    		'id' => $object_id_from_form);
    	$newuser = new User();
    	$newuser->create($testdata, $name_from_form);
    }

?>