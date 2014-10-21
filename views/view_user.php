<?php
require_once('../controllers/database.php');
require_once '../controllers/crud.php';
require_once('../controllers/user.php');
require_once('../controllers/group.php');
?>

<!DOCTYPE html>
<head>
	<title>UserLearning Pbc Project</title>
	<?php include_page_header_content();?>
</head>

<body>
<div class ="content">
<?php print_sitewide_menu();?>

	<form class="form" id="viewuser" action="view_user.php" method="post"><br /><br />
	<select name="id" id="id" form="viewuser">
					 <?php 
					 	$users = new User();
					 	$id_array = $users->grab_all_user_ids();
					 	foreach ($id_array as $id => $value) {
					 		echo "<option value=\"{$value}\">{$value} - {$users->get_name_by_id($value)}</option>";
					 	}

					 ?>
	</select>

		<button type="submit" class="button">View User's Data</button>
		<br /><br /><br />
	</form>

<?php 
		if(isset($_POST['id']) && ($_POST['id'] > 0)){
		$user = new User();
		$user->get_user_object_by_id($_POST['id']);
		$groups_array = $user->get_number_of_groups_for_a_user($_POST['id']);
		$user_details_ids = $user->get_user_details_array($_POST['id']);
		// DISPLAY (this is practically the VIEW //
				echo '<div class="row">';
					echo '<div class="col-xs-1 col-md-1"> </div>';
					echo '<div class="col-xs-10 col-md-10">';
						echo '<h3> Userdata for user : '.$_POST["id"].'</h3>';
						echo '<table class="table table-bordered">';
						echo '<th>ID</th>';
						echo '<th>Name</th>';
						echo '<th>Password</th>';
						echo '<th>Is member of</th>';
						echo '<tr>';
		                echo '<td>'. $user->id .'</td>';
						echo '<td>'. $user->name . '</td>';
						echo '<td>'. $user->password . '</td>';
						echo'<td>'.  implode(" / ",$groups_array) . '</td>';	
		                echo '</tr>';
		            	echo '</table>';
		            	echo '<div class="col-xs-1 col-md-1"> </div>';
	            	echo '</div>';
            	echo '</div>';

            echo "<h3>The details for this user are :</h3>";
			foreach ($user_details_ids as $user_detail_id) {
			    
				$detail = $user->get_detail_data_by_detail_id($user_detail_id);
				
				echo "<br />";
				echo '<div class="row">';
					echo '<div class="col-xs-5 col-md-5"></div>';
					echo '<div class="col-xs-2 col-md-2">';
						echo '<table class="table table-bordered">';
							echo '<th class="col-xs-2 col-md-2">'. $detail['type'] .'</th>';							
							echo '<td class="col-xs-2 col-md-2">'. $detail['value'] .'</td>';
						echo '</table>';
					echo '</div>';
				echo '</div>';
				//BUG FOUND : WHEN ADDING A USER  , IF DETAILS ARE THE SAME  ONLY ONE DETAIL IS ADDED TO THE DB.
				// error is @ Unable to add f : This detail already exists for this user / Is null !Unable to add f : This detail already exists for this user / Is null !
			}            	
		}
?>
</div>
<?php include_page_footer_content(); ?>
</body>

<html>

