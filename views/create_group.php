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
<!--
				<select name="name" form="asd">
 					 <option value="users">User</option>
 					 <option value="groups">Group</option>
				</select>	-->
				<!--FOR THE ID , WE SHOULD GRAB THE LAST ID FROM THE DATABASE , AND INCREMENT IT WITH 1 (form should be hidden i think) -->
				<label>id</label><br />
				<input name="id" 		type="text"  placeholder="WILL DEPRECATE"> <br />
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
?>