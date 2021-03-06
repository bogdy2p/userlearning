<?php require_once('../models/groups_model.php'); ?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content();?>
</head>
<body>
	<script type="text/javascript" src="../assets/ajaxusername.js"></script>

	<div class ="container">
		<div class="row"><?php Crud::print_sitewide_menu();?></div>
		
		<div class="row"><?php generate_groups_table_list_html();?></div>
		<div class="row">
				<div class="col-xs-4 col-md-4"></div>
				<div class="col-xs-4 col-md-4">
					<br />
					
					
					<form class="form" id="asd" action="create_group.php" method="post">
						<div id="group_error"></div>
						<label>group name</label><br />
						<input name="name" id="groupname" type="text"  placeholder="group name"> <br />
						<label>special key</label><br />
						<input name="special key"  type="text"  placeholder="special key"> <br />
						<br />
						<button type="submit" id="submit" class="btn btn-success">Create Group</button>
					</form>
				</div>
				<div class="col-xs-4 col-md-4"></div>
		</div>
 	</div>
<?php Crud::include_page_footer_content(); ?>
</body>
</html>
<!-- FUNCTIONALITY -->
<?php 
	$group = new Group();
	$group->create_group_with_data();
?>