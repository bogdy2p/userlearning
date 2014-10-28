<?php
//INCLUDE THE CONTROLLERS
require_once('../controllers/database.php');
require_once('../controllers/crud.php');
require_once('../controllers/user.php');
require_once('../controllers/group.php');
require_once('../controllers/function_call_log.php');
?>

<?php

function generate_func_call_log_table_html($limit){
	generate_func_call_log_table_header($limit);
	generate_func_call_log_table_content($limit);
	generate_func_call_log_table_footer();
}
function generate_func_call_log_table_header($limit){
	echo '<div class="col-xs-12 col-md-12">';
	echo '<h3>LAST ' .$limit.' FUNCTION LOGS :</h3>';
	echo '<table class="table table-bordered">';
	echo '<th class="success wordrwapped">Id</th>';
	echo '<th class="success wordrwapped">Name</th>';
	echo '<th class="success wordrwapped">Text</th>';
	echo '<th class="success wordrwapped">Created</th>';
}
function generate_func_call_log_table_content($limit){
	$log = new Log();
	$logs = $log->list_logs_bydate_desc($limit);
	foreach ($logs as $individual_log) {
			$type = 'logs';
				echo '<tr>';
                echo '<td class="warning wordrwapped">'. $individual_log['id'] . '</td>';
                echo '<td class="wordrwapped">'. $individual_log['name'] . '</td>';
                echo '<td class="wordrwapped">'. $individual_log['text'] . '</td>';
                echo '<td class="wordrwapped">'. $individual_log['date_created'] . '</td>';
                echo '</tr>';
		}
}
function generate_func_call_log_table_footer(){
	echo '</table></div>';
}

?>