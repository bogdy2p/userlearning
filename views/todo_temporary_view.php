<?php require_once '../models/todo_model.php';?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content();?>

</head>

<body>
	<div class="container">
			<div class="row"><?php Crud::print_sitewide_menu();?></div>
	
	
		<div class="row">
		
				<div class="col-xs-12 col-md-4"></div>
				<div class="col-xs-12 col-md-4">
					<?php generate_todo_add_new_form(); ?>
				</div>
				<div class="col-xs-12 col-md-4"></div>
				
		</div>
	

		<div class="row">
				<div class="col-xs-12 col-md-1"></div>
				<div class="col-xs-12 col-md-10">
					<?php Todo::generate_todo_list_html_admin(); ?>
				</div>
				<div class="col-xs-12 col-md-1"></div>
				
		</div>
	
		<!-- <hr>
		<h4>BOOTSTRAP COLUMNS</h4>
		<hr>
		colmd2
		<div class="row">
				
				<div class="col-xs-12 col-md-2">111111111111111111111111 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-2">222222222222222222222222 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-2">333333333333333333333333 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-2">444444444444444444444444 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-2">555555555555555555555555 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-2">666666666666666666666666 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
		</div>
		<hr>
		colmd3
		<div class="row">
				
				<div class="col-xs-12 col-md-3">1111111111111111111111111111111111111 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-3">2222222222222222222222222222222222222 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-3">3333333333333333333333333333333333333 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-3">4444444444444444444444444444444444444 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
		</div>
		<hr>
		colmd4
		<div class="row">
				
				<div class="col-xs-12 col-md-4">1111111111111111111111111111111111111111111111111 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-4">2222222222222222222222222222222222222222222222222 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-4">3333333333333333333333333333333333333333333333333 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
		</div>
		<hr>
		colmd6
		<div class="row">
				
				<div class="col-xs-12 col-md-6">11111111111111111111111111111111111111111111111111111111111111111111111111 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
				<div class="col-xs-12 col-md-6">22222222222222222222222222222222222222222222222222222222222222222222222222 asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf asdasdsfasdasd sfasdasdsfas dasds fasdasdsf</div>
		</div>
		<hr>
 -->
	</div>
<?php Crud::include_page_footer_content(); ?>


</body>


</html>