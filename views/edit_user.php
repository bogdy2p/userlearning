<?php
 require_once('../controllers/crud.php');
 require_once('../controllers/user.php');
 require_once('../controllers/group.php');
?>

<?php 

	if(isset($_GET['id'])){
			$user = new User();
	//FETCH THE USER FROM THE DATABASE
			$user->get_user_object_by_id($_GET['id']);
			
		$_POST['id'] = $_GET['id'];
		$_POST['name'] = $user->name;
		//echo "<pre>";
		//print_r($user->name);echo "<br />";
		//print_r($user->password);echo "<br />";
		//print_r($user->details);

		$old_details = $user->details;
		$the_old_pass = $user->password;
		$the_user_id = $_GET['id'];
		//VERIFY OLD PASSWORD 
		if(isset($_POST['old_password'])){ 
				
				if(md5($_POST['old_password']) == $the_old_pass){
						if($_POST['password'] === $_POST['pass_conf']) {
							$newpass = md5($_POST['password']);
							$user_update_details = array(
								'id' => $_POST['id'],
								'name' => $_POST['name'],
								'password' => $newpass,
								'details' => array($_POST['details'],),
								);

							$update = $user->update($user_update_details['id'],'users',$user_update_details);
							
							header("Location: /user/views/list.php");		
							die();						
						}else{
							print_r("The passwords you entered do not match.");
						}
				} else {
					print_r("The old password you entered is incorrect.");
				}
		}
	}


?>



<!DOCTYPE html>


<head>
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body>
	<div class ="content">
		<a href="/user"><h4 align="center">Go back.</h4></a>	

			<form class="form" id="edituser" action="edit_user.php?id=<?php echo $the_user_id;?>&type=users" method="post">

				<label>Name</label><br />
				<input name="name"  type="text"  placeholder="User Name" value="<?php if(isset($_POST['name'])) echo $_POST['name'];?>"> <br />
				<label>Enter OLD Password</label><br />
				<input name="old_password"  type="text"  placeholder="Old Password" value=""><br />
				<label>New Password</label><br />
				<input name="password"  type="text"  placeholder="New Password" value=""><br />
				<label>Confirm New Password</label><br />
				<input name="pass_conf" type="text"  placeholder="Confirm New Password" value=""><br />
				<label>Details Array</label><br />
				<input name="details"   type="text"  placeholder="Details Array" value="<?php if(isset($old_details)) echo $old_details;?>"> <br/>
				
				<button type="submit" class="button">Save</button>
			</form>

	</div>
</body>


</html>

