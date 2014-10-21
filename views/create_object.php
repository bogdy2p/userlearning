<?php
 require_once('../controllers/crud.php');
 require_once('../controllers/user.php');
 require_once('../controllers/group.php');
?>
<!DOCTYPE html>
<head>
	<title>Create a new Object - UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>
<body>
	<div class ="content">
	<?php print_sitewide_menu();?>
				
			<form class="form" id="asd" action="create_object.php" method="post">
				<input name="id" type="text"  placeholder="enter an id here !"> <br />
				<select name="name" form="asd">
 					 <option value="users">User</option>
 					 <option value="groups">Group</option>
				</select>	
				<button type="submit" class="button">Create</button>
			</form>
 	</div>
 	<?php include_page_footer_content(); ?>
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