<?php
 require_once('classes/crud.php');
 require_once('classes/user.php');
 require_once('classes/group.php');
?>

<!DOCTYPE html>
<head>
	<title>Create  - UserLearning Pbc Project</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
	<div class ="content">
		<a href="/user"><h4 align="center">Go back.</h4></a>	

			<form class="form" id="asd" action="create.php" method="post">
<!--
				<select name="name" form="asd">
 					 <option value="users">User</option>
 					 <option value="groups">Group</option>
				</select>	-->
				<!--FOR THE ID , WE SHOULD GRAB THE LAST ID FROM THE DATABASE , AND INCREMENT IT WITH 1 (form should be hidden i think) -->
				<label>id</label><br />
				<input name="id" 		type="text"  placeholder="enter an id here !"> <br />
				<label>username</label><br />
				<input name="username"  type="text"  placeholder="enter desired username"> <br />
				<label>password</label><br />
				<input name="password"  type="text"  placeholder="enter password"> <br />
				<label>confirm password</label><br />
				<input name="pass_conf" type="text"  placeholder="confirm password"> <br />
				<label>details array</label><br />
				<input name="details"   type="text"  placeholder="enter details "> <br />
				<label>group assigned to</label><br />
				<input name="group_id"  type="text"  placeholder="enter group id here"> <br />
				
				<button type="submit" class="button">Create</button>

			</form>
 	</div>
</body>

</html>





<!-- FUNCTIONALITY -->




<?php 
?>