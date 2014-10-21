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



	<form class="form" id="viewgroup" action="view_group.php" method="post"><br /><br />
	<select name="id" id="id" form="viewgroup">
					 <?php 
					 	$groups = new Group();
					 	$id_array = $groups->grab_all_group_ids();
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$value} - {$groups->get_name_by_id($value)}</option>";
					 	}
					 ?>
	</select>

		
		<button type="submit" class="button">View Group's Data</button>
	</form>

<?php 

		if(isset($_POST['id']) && ($_POST['id'] > 0)){
		$group = new Group();
		$group->get_group_object_by_id($_POST['id']);
		// DISPLAY (this is practically the VIEW //
				echo '<table class="default_css_table">';
				echo '<th>ID</th>';
				echo '<th>Name</th>';
				echo '<th>Special Key</th>';
				echo '<tr>';
                echo '<td>'. $group->id .'</td>';
				echo '<td>'. $group->name . '</td>';
				echo '<td>'. $group->special_key . '</td>';
                echo '</tr>';
            	echo '</table>';
		}
?>
</div>
<?php include_page_footer_content(); ?>
</body>

<html>

