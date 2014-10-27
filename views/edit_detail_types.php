<?php //Require access to database , user , group and crud class.
require_once '../models/detail_types_model.php';
?>

<!DOCTYPE html>
<head>
	<title>Edit User</title>
	<?php include_page_header_content();?>
</head>

<body>
	<div class="container">
		<div class="row"> <?php print_sitewide_menu();?> </div>
	
		<div class="row"> <!--SECOND ROW -->
			<div class="col-xs-2 col-md-4"></div>
			<div class="col-xs-8 col-md-4"><h3>Edit detail type</h3></div>
			<div class="col-xs-2 col-md-4"></div>
		</div> <!--END SECOND ROW -->

		<div class="row"> <!--THIRD ROW -->
			<hr>
			<div class="col-xs-12 col-md-4"> <!--FIRST COLUMN -->
				<?php 
					$user = new User();
					$test = $user->get_detail_type_by_name($_GET['name']);	
					print_edit_detail_table_html($test['name']);
				?>
			</div> <!-- END FIRST COLUMN -->
			<div class="col-xs-12 col-md-4"> <!--SECOND COLUMN -->
				<div class="row">
							<?php 
								print_edit_existing_detail_form($_GET['name']);
							?>
				</div>
			</div> <!--END SECOND COLUMN -->
			<div class="col-xs-12 col-md-4"> <!--3rd COLUMN -->
				
			</div> <!--END THIRD COLUMN -->
			
		</div><!--END THIRD ROW -->
	</div>
 <?php include_page_footer_content(); ?>
</body>

</html>


<?php
$received_parameter = $_GET['name'];
 //echo '<h4>you are now on edit detail types , editing <b> <spanred>'.$received_parameter.' </spanred> </b>detail.</h4>';
$user = new User();
$asd = $user->get_detail_type_by_name($received_parameter);
?>