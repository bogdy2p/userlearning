<?php
require_once('../models/changelog_model.php');
 ?>
<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php Crud::include_page_header_content();?>
</head>
<body>
	<div class="container">
		<div class="row"><?php print_sitewide_menu();?></div>

		<div class="row">
			<div class="col-xs-12 col-md-4">
				<?php generate_changelog_add_new_form();?>
				Add new changelog form here.<br><br><br><br>Changelog name , select list for colour code , and select list for heading type
			</div>
			<div class="col-xs-12 col-md-4 "> 	<h2>Latest Applied Changes:</h2></div>
			<div class="col-xs-12 col-md-4">
				Changelog Table Sorting Options Form here<br><br><br> The table sorting options should be managed with AJAX !!!
			</div>
		</div>
		  		<?php 
					generate_changelog_table_html();
				?>
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
</body>
</html>




