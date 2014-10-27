<?php require_once('../models/function_call_log_model.php'); ?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>
<body>
	<div class="container">
		<div class="row"><?php print_sitewide_menu();?></div>
	</div>
	<div class ="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-2"></div>
			<div class="col-xs-12 col-md-8">
				<?php 
					generate_func_call_log_table_html();
				?>
			</div>
			<div class="col-xs-12 col-md-2"></div>
		</div>
	</div>
<?php include_page_footer_content(); ?>
</body>
</html>