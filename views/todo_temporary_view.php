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
				<div class="col-xs-12 col-md-4"></div>
				<div class="col-xs-12 col-md-4">
					<?php generate_todo_add_new_form(); ?>
				</div>
				<div class="col-xs-12 col-md-4"></div>
				
		</div>
		<div class="row">
				<div class="col-xs-12 col-md-1"></div>
				<div class="col-xs-12 col-md-10">
					<?php generate_todo_list_html(); ?>
				</div>
				<div class="col-xs-12 col-md-1"></div>
				
		</div>
	
	

	</div>
<?php Crud::include_page_footer_content(); ?>


</body>


</html>