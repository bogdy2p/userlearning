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
		
			<form class="form" id="asd" action="create.php" method="post"> <!--CHANGE METHOD TO POST !-->
				<!-- http://www.startutorial.com/articles/view/php-crud-tutorial-part-2/ -->
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
    	//echo $object_id_from_form;
    	//echo $name_from_form;
    	$testdata = array(
    		'id' => $object_id_from_form);
    	$newuser = new User();
    	$newuser->create($testdata, $name_from_form);
    }

?>