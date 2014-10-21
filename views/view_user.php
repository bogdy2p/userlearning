<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>
<div class ="content">
<?php print_sitewide_menu();?>

	<form class="form" id="viewuser" action="view_user.php" method="post"><br /><br />
	<select name="id" id="id" form="viewuser">
					 <?php 
					 	$users = new User();
					 	$id_array = $users->grab_all_user_ids();
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$value} - {$users->get_name_by_id($value)}</option>";
					 	}
					 ?>
	</select>

		<button type="submit" class="button">View User's Data</button>
	</form>

<?php 
		if(isset($_POST['id']) && ($_POST['id'] > 0)){
		$user = new User();
		$user->get_user_object_by_id($_POST['id']);
		$groups_array = $user->get_number_of_groups_for_a_user($_POST['id']);
		// DISPLAY (this is practically the VIEW //
				echo '<table class="default_css_table">';
				echo '<th>ID</th>';
				echo '<th>Name</th>';
				echo '<th>Password</th>';
				//echo '<th>Details Array</th>';
				echo '<th>Group Id Array</th>';
				echo '<tr>';
                echo '<td>'. $user->id .'</td>';
				echo '<td>'. $user->name . '</td>';
				echo '<td>'. $user->password . '</td>';
				//echo '<td>'. $user->details . '</td>';
				echo'<td>'.  implode(" / ",$groups_array) . '</td>';	
                echo '</tr>';
            	echo '</table>';
		}
?>
</div>
<?php include_page_footer_content(); ?>
</body>

<html>

