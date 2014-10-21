<?php

class Database{ // DEPRECATED !?!??! try with PDO .. ?  http://www.startutorial.com/articles/view/php-crud-tutorial-part-1 ?

    public function dbConnect(){
        return new PDO("mysql:host=localhost;dbname=user_groups",'root','romania2007');
    }
}

 function include_page_header_content() {
	// INCLUDE CSS FILES
 	echo '<meta charset="utf-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';

    echo '<link rel="stylesheet" type="text/css" href="assets/css/style.css"> ';
	echo '<link rel="stylesheet" type="text/css" href="../assets/css/style.css"> ';
    echo '<link href="assets/css/bootstrap.min.css" rel="stylesheet">';
	echo '<link href="../assets/css/bootstrap.min.css" rel="stylesheet">'; 
	// INCLUDE BOOTSTRAP FILES ETC
}

function include_page_footer_content(){
	echo '<!-- jQuery (necessary for Bootstrap JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>';
}

function print_sitewide_menu(){
    echo'   
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-9 col-md-9">
                <a class ="btn btn-primary" href="/user">Home</a>
                <a class ="btn btn-primary" href="/user/views/view_list.php">View Tables</a>
                <a class ="btn btn-primary" href="/user/views/create_user.php">Add User</a>
                <a class ="btn btn-primary" href="/user/views/create_group.php">Add Group</a>
                <a class ="btn btn-primary" href="/user/views/assign.php">Map User</a>
                <a class ="btn btn-primary" href="/user/views/view_detail_types.php">User Details Types</a>
                <a class ="btn btn-primary" href="/user/views/view_user.php">View User</a>
                <a class ="btn btn-primary" href="/user/views/view_group.php">View Group</a>
                </div>
                <div class="col-xs-2 col-md-2"></div>
            </div>
            <br /><br /><br />';
}