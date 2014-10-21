<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
require_once('../models/user_list.php');
require_once('../models/groups_list.php');
require_once('../models/mapping_list.php');

?>
<!DOCTYPE html>

<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>
	<div class ="container">
		<div class="row"><?php print_sitewide_menu(); ?></div>

	<?php 

		//Include the users table into list display;
		generate_users_table();
		//Include the groups table into list display;

		generate_groups_table();
		//Include the mapping table into list display;
		generate_mapping_table();
		//Include users_by_group table into list display;

		

	?>

		<div class="row">
			<?php generate_groups_users_table(); ?>
		</div>
	</div>

<?php include_page_footer_content(); ?>
</body>

<html>
