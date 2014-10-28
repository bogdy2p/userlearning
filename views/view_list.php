<?php
//VIEWS SHOULD INCLUDE ONLY THE MODELS NOT THE CONTROLLERS
require_once('../models/user_model.php');
require_once('../models/groups_model.php');
require_once('../models/mapping_model.php');
?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>
	<div class="container">
			<div class="row"><?php print_sitewide_menu();?></div>
	</div>
	<div class ="container">
		<div class="row">
				<?php 
				//Include the users table into list display;
				generate_users_table_html();
				//Include the groups table into list display;
				generate_groups_table_html();
				?>
		</div>
		<div class="row">
			<?php
				//Include the mapping table into list display;
				generate_mapping_table_html();
				//Include users_by_group table into list display;
				generate_groups_users_table_html();		
			?>
		</div>
	
	

	</div>
<?php include_page_footer_content(); ?>
</body>

<html>

