<?php require_once('../models/changelog_model.php'); ?>
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
			<div class="col-xs-12 col-md-4">
				<?php generate_changelog_add_new_form();?>
			</div>
			<div class="col-xs-12 col-md-4 "> 	
				<h2>Latest Applied Changes:</h2>
			</div>
			<div class="col-xs-12 col-md-4">
	<!-- ****************************************************************************************************************   -->
					<?php generate_select_day_form();?>
	<!-- *****************************************************************************************************************   -->	
			</div>
		</div>
		<div class ="row">
				<?php generate_changelog_table_by_post(); ?>
		</div>
		  		
		<div class="row">
		  		<?php Crud::print_color_meanings(); ?>
		</div>
    </div>
    <?php Crud::include_page_footer_content(); ?>
</body>
</html>




