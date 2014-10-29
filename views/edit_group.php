<?php
 require_once '../models/groups_model.php';
?>
<?php 

	if(isset($_GET['id'])){
		$group = new Group();
		$group->get_group_object_by_id($_GET['id']);
		$group_id = $group->id; 
		$old_name = $group->name;
		$old_special_key = $group->special_key;
		$_POST['id'] = $_GET['id'];

		if(isset($_POST['name']) && isset($_POST['special_key'])){
		
			$group_update_details = array(
					'id' => $_POST['id'],
					'name' => $_POST['name'],
					'special_key' => $_POST['special_key'],
					);
			
			$update = $group->update($group_update_details['id'],'groups',$group_update_details);
			header("Location: /user/views/view_list.php");
			die();						
			}
	}

?>

<!DOCTYPE html>
<head>
	<title>Edit Group</title>
	<?php Crud::include_page_header_content();?>
</head>

<body>
	<script type="text/javascript" src="../assets/ajaxusername.js"></script>
	<div class ="container">
	<?php Crud::print_sitewide_menu();?>

		

			<form class="form" id="editgroup" action="edit_group.php?id=<?php echo $group_id;?>&type=groups" method="post">

				<label>Name</label><br />
				<input name="name"  type="text"  placeholder="Group Name" value="<?php if(isset($old_name)) echo $old_name;?>"> <br />
				<label>Special Key</label><br />
				<input name="special_key"   type="text"  placeholder="Special Key" value="<?php if(isset($old_special_key)) echo $old_special_key;?>"> <br/>
				
				<button type="submit" id="submit" class="button">Save Group</button>
			</form>

	</div>
	<?php Crud::include_page_footer_content(); ?>
</body>

</html>

