<?php
//INCLUDE THE CONTROLLERS
require_once('../controllers/database.php');
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
require_once('../controllers/function_call_log.php');
?>

<?php

function generate_func_call_log_table_html(){
	generate_func_call_log_table_header();
	generate_func_call_log_table_content();
	generate_func_call_log_table_footer();
}
function generate_func_call_log_table_header(){
	echo '<div class="col-xs-12 col-md-12">';
	echo "<h3>ALL FUNCTION LOGS :</h3>";
	echo '<table class="table table-bordered">';
	echo '<th class="success" id="wordwrap">Id</th>';
	echo '<th class="success" id="wordwrap">Name</th>';
	echo '<th class="success">Text</th>';
	echo '<th class="success">Created</th>';
}
function generate_func_call_log_table_content(){
	$log = new Log();
	$logs = $log->list_logs_bydate_desc();
	foreach ($logs as $individual_log) {
			$type = 'logs';
				echo '<tr>';
                echo '<td class="warning">'. $individual_log['id'] . '</td>';
                echo '<td id="wordwrap">'. $individual_log['name'] . '</td>';
                echo '<td id="wordwrap">'. $individual_log['text'] . '</td>';
                echo '<td>'. $individual_log['date_created'] . '</td>';
                echo '</tr>';
		}
}
function generate_func_call_log_table_footer(){
	echo '</table></div>';
}

?>