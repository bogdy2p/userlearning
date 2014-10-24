<?php 
require_once '../controllers/crud.php';
require_once '../controllers/user.php';
require_once '../controllers/group.php';
require_once '../controllers/database.php';
require_once '../models/detail_types_model.php';
?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>
<body>
	<div class="container">
		<div class="row"> <?php print_sitewide_menu();?> </div>
	
		<div class="row"> <!--SECOND ROW -->
			<div class="col-xs-2 col-md-4"></div>
			<div class="col-xs-8 col-md-4"><h3>User Detail Types</h3><br />(add/edit/view user fields)</div>
			<div class="col-xs-2 col-md-4"></div>
		</div> <!--END SECOND ROW -->

		<div class="row"> <!--THIRD ROW -->
			<hr>
			<div class="col-xs-12 col-md-3"> <!--FIRST COLUMN -->
				
			</div> <!-- END FIRST COLUMN -->
			<div class="col-xs-12 col-md-3"> <!--SECOND COLUMN -->
				<div class="row">
							<?php 
								$user = new User();
								$detail_types_array = $user->get_all_user_detail_types();
								print_user_details_table_html($detail_types_array); 
							?>
				</div>
			</div> <!--END SECOND COLUMN -->
			<div class="col-xs-12 col-md-3"> <!--3rd COLUMN -->
				<div class="row"> 
						<div class="col-xs-3 col-md-1"></div>
						<div class="col-xs-6 col-md-10">
							<?php 
								print_add_new_user_detail_form();
							?>
						</div>
						<div class="col-xs-3 col-md-1"></div>
				</div>	
			</div> <!--END THIRD COLUMN -->
			<div class="col-xs-12 col-md-3"> <!--4th COLUMN -->

			</div> <!--END FOURTH COLUMN -->
		</div><!--END THIRD ROW -->
	</div>
 <?php include_page_footer_content(); ?>
</body>
</html>
