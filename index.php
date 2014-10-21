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

		<div class="row">
		<?php print_sitewide_menu();?>
		</div>		
		<div class="row">
			 <div class="col-xs-4 col-md-4"></div>
  			 <div class="col-xs-4 col-md-4"><h1>Users-Groups</h1></div>
  			 <div class="col-xs-4 col-md-4"></div>
  		</div>

		<div class="row">	

	  	<h3>todo:</h3>

	  	<h5>AJAX / Jquery @ editing user </h5>
	  	<h5>Groups by "checkbox... ?"</h5>
	  	<h5></h5>
	  	<h5></h5>
	  	<h5></h5>
	  	<h5>PRINT DATABASE STATISTICS as : how many programmers, how many users in total , how many designer , how many X.</h5>	
	  	<h5>When creating a new user , save the user's account CREATION TIME.</h5>
	  	<h5>Print "last created user";</h5>
	  	<h5>Print User with most details entered</h5>

<br /><br /><br />
	  	
	  	</div>

  		<?php 
  		$user = new User();
  		$group = new Group();
          //function check_detail_exists($user_id,$detail_type,$detail){
      //ADRESS DOESNT MATTEE
      //check_detail_exists_of_type($user_id,$detail_type,$detail)
      //$test = $user->check_detail_exists_of_type('1','phone','1243');

      // echo "<pre>";
      // var_dump($test);
      // echo "</pre>";

  		//PRINT ALL DETAILS ARRAY
  		// echo "<pre>";
  		// echo "all details array :<br />";
  		// $asd = $user->get_all_user_details();
  		// print_r($asd);
  		// echo "</pre>";


  		?>

	  	
	  
   </div>
   <?php include_page_footer_content(); ?>
</body>
</html>

<?php
$user = new User();
$testgrp = new Group();
?>
