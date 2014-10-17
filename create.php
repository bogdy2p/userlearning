<?php
 require_once('classes/crud.php');
 require_once('classes/user.php');
 require_once('classes/group.php');
?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>

<body>

	<div class ="content">
		
			
			<form class="form" action="create.php" method="get"> <!--CHANGE METHOD TO POST !-->
				<!-- http://www.startutorial.com/articles/view/php-crud-tutorial-part-2/ -->
				<input name="id" type="text"  placeholder="enter an id here !"> <br />
				<input name="name" type="text"  placeholder="Username/Groupname"><br />
				<button type="submit" class="button">Create</button>

			</form>
 	</div>


</body>

</html>

<?php 


?>