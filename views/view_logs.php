<?php 
require_once '../models/function_call_log_model.php';


	$log = new Log();

//	$logs->display_logs();
	$asd = $log->grab_logs_array();
	// echo "<pre>";
	// //print_r($asd);
	// echo "</pre>";

	echo "<table>";
	echo "<th>ID</th>";
	echo "<th>NAME</th>";
	echo "<th>TEXT</th>";
	echo "<th>DATE</th>";



	foreach ($asd as $key => $value) {
		
		
		//print_r($key);// $value;
		

		echo "<tr>";
			echo"<td>";
			print_r($value[0]);
			echo"</td>";
		echo "</tr>";
		# code...
	}


	echo "</table>";

	// echo "<h3>All logging data from the logging tables will be displayed here</h3>";


	// echo "view_logs VIEW";

?>

<!DOCTYPE html>

<head></head>

<body></body>


</html>