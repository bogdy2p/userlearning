<?php 
require_once 'controllers/crud.php';
require_once 'controllers/user.php';
require_once 'controllers/group.php';
require_once 'controllers/database.php';
?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>
	<div class="container">
			<div class="row"><?php print_sitewide_menu();?></div>

			<div class="row">
				 <div class="col-xs-12 col-md-4 "></div>
	  			 <div class="col-xs-12 col-md-4 "><h1>Users-Groups Administration</h1></div>
	  			 <div class="col-xs-12 col-md-4 "></div>
	  		</div>
			<div class="row">
				<hr>
				<div class="col-xs-12 col-md-3 ">
				 	<h2>Latest Changes:</h2>
				</div>
				<div class="col-xs-12 col-md-7 ">
				  	<?php print_latest_work_list();?>
				</div>
				<div class="col-xs-12 col-md-2 "></div>
		  	</div>
		  	<div class="row">
		  		<hr>
			  	<div class="col-xs-12 col-md-3">
			  		<h2>To do (to change/add):</h2>
			  	</div>

			  	<div class="col-xs-12 col-md-6">
			  	 	<?php print_to_do_list();?>
				</div>
				<div class="col-xs-12 col-md-3">
					///////// ////////// //////?DATABASE STATISTICS Block?/// / // ///// //////////////
				</div>	
		  	</div>
		  	<div class="row">
		  	<hr>
		  		<div class="col-xs-12 col-md-2"><h1>Colours meaning</h1></div>
		  		<div class="col-xs-12 col-md-7">
		  			<ul>
		  				<li><spanred><h5><b>RED</b></h5></spanred> = HIGH PRIORITY / HIGH DIFFICULTY</li>
		  				<li><spanyel><h5><b>YELLOW</b></h5></spanyel> = NORMAL PRIORITY / NORMAL DIFFICULTY</li>
		  				<li><spangre><h5><b>GREEN</b></h5></spangre> = LOW PRIORITY / LOW DIFFICULTY</li>
		  			</ul>
		  		</div>
		  		<div class="col-xs-12 col-md-3"></div>
		  	</div>
   </div>
   <?php include_page_footer_content(); ?>
</body>
</html>
