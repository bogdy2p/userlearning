<?php require_once('../models/function_call_log_model.php');?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content();?>
</head>
<body>
	<div class ="container">
		<div class="row"><?php Crud::print_sitewide_menu();?></div>
		<div class="row">
					<?php generate_func_call_log_table_html('10');?>
		</div>
	</div>
<?php Crud::include_page_footer_content(); ?>
</body>
</html>