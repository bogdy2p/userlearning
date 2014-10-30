<?php require_once '../models/todo_model.php';?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content();?>

</head>

<body>
	<div class="container">
			<div class="row"><?php Crud::print_sitewide_menu();?></div>
	</div>
	<div class ="container">
		<div class="row">
				<?php 

				generate_todo_add_new_form();

				?>
		</div>
		<div class="row">
			
		</div>
	
	

	</div>
<?php Crud::include_page_footer_content(); ?>


</body>


</html>