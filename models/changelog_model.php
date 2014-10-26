<?php
//INCLUDE THE CONTROLLERS
require_once('../controllers/database.php');
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
require_once('../controllers/function_call_log.php');
require_once('../controllers/changelog_controller.php');
?>


<?php

function generate_changelog_table_html(){
	generate_changelog_table_header();
	generate_changelog_table_content();
	generate_changelog_table_footer();
}
function generate_changelog_table_header(){
	echo '<div class="col-xs-12 col-md-12">';
	echo "<h3>ALL CHANGE LOGS :</h3>";
	echo '<table class="table table-bordered">';
	echo '<th class="success">Id</th>';
	echo '<th class="success">Name</th>';
	echo '<th class="success">Text</th>';
	echo '<th class="success">Created</th>';
}
function generate_changelog_table_content(){
	$changelog = new Changelog();
	$changelogs = $changelog->read_changelogs();
	foreach ($changelogs as $individual_changelog) {
			$type = 'changelogs';
				echo '<tr>';
                echo '<td class="warning">'. $individual_changelog['id'] . '</td>';
                echo '<td>'. $individual_changelog['name'] . '</td>';
                echo '<td>'. $individual_changelog['colour'] . '</td>';
                echo '<td>'. $individual_changelog['date'] . '</td>';
                echo '</tr>';
		}
}
function generate_changelog_table_footer(){
	echo '</table></div>';
}

?>