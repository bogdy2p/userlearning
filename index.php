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
	<div class="container-fluid">

		<div class="row"><?php print_sitewide_menu();?></div>

		<div class="row">
			 <div class="col-xs-4 col-md-4"></div>
  			 <div class="col-xs-4 col-md-4"><h1>Users-Groups Administration</h1></div>
  			 <div class="col-xs-4 col-md-4"></div>
  		</div>

		<div class="row">
		<hr>
			 <div class="col-xs-3 col-md-3">
			 		<h2>Latest Changes:</h2>
			 </div>
			 <div class="col-xs-7 col-md-7">
			  	
			  	<ol>
				  	<li><h4><spanred>Added Map Groups to user by "checkbox..."</spanred></h4></li>
				  	<li><h4><spanora>Fixed map groups by checkbox without changing the user password</spanora></h4></li>
				  	<li><h4><spanyel>Fixed the bootstrap javascript including (wasn't working)</spanyel></h4></li>
				  	<li><h4><spanora>Removed the old menu ,added a responsive navigation menu </spanora></h4></li>
				  	<li><h4><spangre>Fixed the site template (The menu and the content have now the same width across all pages)</spangre></h4></li>
			  	</ol>
			 	
			 </div>
			 <div class="col-xs-2 col-md-2"></div>
	  	
	  	</div>
	  	<div class="row">
	  	<hr>
		  	<div class="col-xs-3 col-md-3">
		  		<h2>To do (to change/add):</h2>
		  	</div>

		  	 <div class="col-xs-6 col-md-6">
		  		<ol>
			  		<li><h5><spanred>FIX the responsiveness of the website...</spanred></h5></li>
			  		<li><h5><spanred>View User Detail Types Page and Functionality</spanred></h5></li>
			  		<li><h5><spanyel>When creating a new user , save the user's account CREATION TIME. (into new table... LOG ?)</spanyel></h5></li>
			  		<li><h5><spanora>AJAX / Jquery @ editing user </spanora></h5></li>
			  		<li><h5><spanyel>PRINT DATABASE STATISTICS as : how many programmers, how many users in total , how many designer , how many X.</spanyel></h5>	</li>
			  		<li><h5><spangre>Print "last created user";</spangre></h5></li>
			  		<li><h5><spanora>Print User with most details entered</spanora></h5></li>
		  		</ol>
			</div>
			<div class="col-xs-3 col-md-3">
				///////// ////////// //////?DATABASE STATISTICS Block?/// / // ///// //////////////
			</div>	
	  	</div>

	  	<div class="row">
	  	<hr>
	  		<div class="col-xs-2 col-md-2"><h1>Colours meaning</h1></div>
	  		<div class="col-xs-7 col-md-7">
	  			<ul>
	  				<li><spanred><h5><b>RED</b></h5></spanred> = HIGH PRIORITY / HIGH DIFFICULTY</li>
	  				<li><spanora><h5><b>ORANGE</b></h5></spanora> = MEDIUM PRIORITY / MEDIUM DIFFICULTY</li>
	  				<li><spanyel><h5><b>YELLOW</b></h5></spanyel> = NORMAL PRIORITY / NORMAL DIFFICULTY</li>
	  				<li><spangre><h5><b>GREEN</b></h5></spangre> = LOW PRIORITY / LOW DIFFICULTY</li>
	  			</ul>
	  		</div>
	  		<div class="col-xs-3 col-md-3"></div>
	  		 

	  	</div>


	  	<br />
				  	
				  	
				  	
				  	
				  	
  
   </div>
   <?php include_page_footer_content(); ?>
</body>
</html>
