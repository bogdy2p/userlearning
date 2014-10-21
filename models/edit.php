<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>
<!DOCTYPE html>

<head></head>
<body>
<form class="form" id="edit" action="edit.php" method="get"><br /><br />


</form>
<?php include_page_footer_content(); ?>
</body>

</html>
<!-- FUNCTIONALITY HERE !-->
<?php 
		echo "<h4> This has been marked as not working yet.</h4><hr>";
		if(isset($_GET['id']) && isset($_GET['type'])){
			
		
		$received_value = $_GET['id'];
		$type = $_GET['type'];
		echo "<h1>";
		switch ($type) {
			case 'users':
				echo "You are about to edit user ".$received_value; 
			break;
			case 'groups':
				echo "You are about to edit group ".$received_value; 
			break;
		}
		echo "</h1>";
		}



?>