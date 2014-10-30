<?php 
		require_once 'controllers/crud.php';
		require_once 'controllers/user.php';
		require_once 'controllers/group.php';
		require_once 'controllers/database.php';
		require_once 'controllers/changelog_controller.php';
?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content_index();?>
</head>
 
<body>
	<div class="container">
			<div class="row"><?php Crud::print_sitewide_menu();?></div>
			
			<div class="row">
					 <div class="col-xs-12 col-md-4 "></div>
		  			 <div class="col-xs-12 col-md-4 "><h1>Users-Groups Administration CMS</h1></div>
		  			 <div class="col-xs-12 col-md-4 "></div>
	  		</div>
	  		<div class="row">
			  		<hr>
				  	<div class="col-xs-12 col-md-3">
				  		<h2>To do (to change/add):</h2>
				  		<?php

				  			$test = new User();
				  			$test->get_table_of_users_and_number_of_detail_types();
				  		?>
				  		
				  	</div>

				  	<div class="col-xs-12 col-md-6">
				  	 	<?php Crud::print_to_do_list();?>
					</div>
					<div class="col-xs-12 col-md-3">
								<?php 
										$user = new User();
										$user->get_database_statistics(); 
								?>
					</div>	
		  	</div>
		  	
		  	<div class="row">
		  			<?php Crud::print_color_meanings(); ?>
		  	</div>
   </div>
   <?php Crud::include_page_footer_content_index(); ?>
</body>
</html>
