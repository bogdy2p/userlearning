<?php 
require_once '../controllers/crud.php';
require_once '../controllers/user.php';
require_once '../controllers/group.php';
require_once '../controllers/database.php';
require_once '../models/detail_types_edit.php';
?>

<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>

	<div class="container">
		<div class="row"> <?php print_sitewide_menu();?> </div>
		
		<div class="row">

			<div class="col-xs-4 col-md-4"></div>
			<div class="col-xs-4 col-md-4"><h3>View User Detail Types</h3></div>
			<div class="col-xs-4 col-md-4"></div>

		<div class="row">
			<div class="col-xs-12 col-md-12">
				<br /><br /><br /><br />
				
			</div>
			<div class="col-xs-4 col-md-4">1.Grab a list with all the detail types from the database. Print them in a table.</div>
			<div class="col-xs-4 col-md-4">2.Print a edit & delete button near each detail type in the table.</div>
			<div class="col-xs-4 col-md-4">3.Print a form to add a new detail type into the db.</div>

		</div>

	</div></div>
 <?php include_page_footer_content(); ?>
</body>


</html>
