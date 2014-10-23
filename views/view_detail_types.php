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
						
						<div class="col-xs-7 col-md-7">
							
							<?php 
								$user = new User();
								$detail_types_array = $user->get_all_user_detail_types();
								// echo "<pre>";
								// var_dump($detail_types_array);
								// echo "</pre>";
								print_user_details_table($detail_types_array); 
							?>
						</div>

						<div class="col-xs-5 col-md-5"></div>
				</div>

				<!-- <div class="row"><br/><br/>1.Grab a list with all the detail types from the database. Print them in a table.</div> -->
				<!-- <div class="row"><br/><br/><h3>echo the list as a table here</h3></div> -->
				<div class="row"></div>
				<div class="row"></div>

			



			</div>
			<div class="col-xs-4 col-md-4">

				<div class="row">2.Print a edit & delete button near <br />each detail type in the table.</div>
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
