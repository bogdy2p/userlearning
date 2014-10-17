<?php
require_once('classes/database.php');
require_once 'classes/crud.php';
require_once('classes/user.php');
require_once('classes/group.php');
?>
<!DOCTYPE html>

<head></head>
<body>
<form class="form" id="edit" action="edit.php" method="get"><br /><br />


</form>
</body>

</html>
<!-- FUNCTIONALITY HERE !-->
<?php 
		echo "<h4> This has been marked as not working yet.</h4><hr>";
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

		//echo "Received id: &nbsp;&nbsp;&nbsp;&nbsp;  ".$received_value . " &nbsp;&nbsp;&nbsp;&nbsp;Received type:&nbsp;&nbsp;&nbsp;&nbsp;   " .$type; 





?>