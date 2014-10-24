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
<div class ="container">
	<div class="row"><?php print_sitewide_menu();?></div>


	<div class="row">
		<div class="col-xs-4 col-md-4"></div>
		<div class="col-xs-4 col-md-4">
			
			<form class="form" id="viewgroup" action="view_group.php" method="post"><br /><br />
				<select name="id" id="id" form="viewgroup">
					 <?php 
					 	$groups = new Group();
					 	$id_array = $groups->grab_all_group_ids();
					 	foreach ($id_array as $id => $value) { echo "<option value=\"{$value}\">{$value} - {$groups->get_name_by_id($value)}</option>";}
					 ?>
				</select>
	<br /><br />
		<button type="submit" class="button">View Group's Data</button>
	</form>

		</div>
		<div class="col-xs-4 col-md-4"></div>
	</div>



	<div class="row">
<?php 

	if(isset($_POST['id']) && ($_POST['id'] > 0)){

	$group = new Group();
	$group->get_group_object_by_id($_POST['id']);
	print_view_group_table_html($group);

	}

?>
	</div>
</div>
<?php include_page_footer_content(); ?>
</body>

<html>

<?php 
function print_view_group_table_html($group){
		print_view_group_table_header();
		print_view_group_table_content($group);
		print_view_group_table_footer();
	}
	function print_view_group_table_header(){
		echo '<br />';
		echo '<table class="table table-bordered col-xs-12 col-md-12">';
		echo '<th class="col-xs-4 col-md-4">ID</th>';
		echo '<th class="col-xs-4 col-md-4">Name</th>';
		echo '<th class="col-xs-4 col-md-4">Special Key</th>';
	}
	function print_view_group_table_content($group){
		echo '<tr>';
        echo '<td>'. $group->id .'</td>';
		echo '<td>'. $group->name . '</td>';
		echo '<td>'. $group->special_key . '</td>';
        echo '</tr>';
	}
	function print_view_group_table_footer(){
		echo '</table>';
	}
?>
