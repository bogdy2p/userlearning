<?php require_once('../models/groups_model.php'); ?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content();?>
</head>
<body>
	<div class ="container">
		<div class="row"><?php Crud::print_sitewide_menu();?></div>
		
		<div class="row">
				<div class="col-xs-4 col-md-4"></div>
				<div class="col-xs-4 col-md-4">
					<br />
					<h4>LIST A GROUPS TABLE HERE FOR THE USER TO SEE WHAT GROUPS ALREADY EXIST </h4>
					<form class="form" id="asd" action="create_group.php" method="post">
						<label>group name</label><br />
						<input name="name"  type="text"  placeholder="group name"> <br />
						<label>special key</label><br />
						<input name="special key"  type="text"  placeholder="special key"> <br />
						<br />
						<button type="submit" class="btn btn-success">Create Group</button>
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