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
	<!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
</head>

<body>
	<div class="container">

		<div class="row"><?php print_sitewide_menu();?></div>

		<div class="row">
			 <div class="col-xs-4 col-md-4"></div>
  			 <div class="col-xs-4 col-md-4"><h1>Users-Groups</h1></div>
  			 <div class="col-xs-4 col-md-4"></div>
  		</div>

		<div class="row">	
		<h2>CHECK SETTINGS IF NOTHING APPEARS</h2>
	  	<h2>todo:</h2>


	  	<h3><span2>Groups by "checkbox... ?"</span2></h3>
	  	<h4><span2>When creating a new user , save the user's account CREATION TIME. (into new table... LOG ?)</span2></h4>
	  	<h5>AJAX / Jquery @ editing user </h5>
	  	
	  	<h5></h5>
	  	<h5></h5>
	  	<h5></h5>
	  	<h5>PRINT DATABASE STATISTICS as : how many programmers, how many users in total , how many designer , how many X.</h5>	
	  	
	  	<h5>Print "last created user";</h5>
	  	<h5>Print User with most details entered</h5>

<br /><br /><br />
	  	
	  	</div>

  		
	  	
	  
   </div>
   <?php include_page_footer_content(); ?>
</body>
</html>
