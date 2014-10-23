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
			
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12">
				<br /><br /><br /><br />
				
			</div>
			<div class="col-xs-4 col-md-4">
				<div class="row"></div>
				<div class="row"> <!--Row split in 2 equal columns-->
						
							<?php 
								$user = new User();
								$detail_types_array = $user->get_all_user_detail_types();
								print_user_details_table($detail_types_array); 
							?>
						
				</div>

				
				<div class="row"></div>
				<div class="row"></div>

			



			</div>
			<div class="col-xs-4 col-md-4">

				<div class="row">&nbsp;&nbsp;&nbsp;2.Print a edit & delete button near <br />&nbsp;&nbsp;&nbsp;each detail type in the table.</div>
				<div class="row"></div>

			</div>

			<div class="col-xs-4 col-md-4">
				
				<div class="row">
					
						<?php 
							print_add_new_user_detail_form();
						?>

				</div>

			</div>

		</div>

	</div>


 <?php include_page_footer_content(); ?>
</body>


</html>
