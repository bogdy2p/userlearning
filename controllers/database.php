<?php

class Database{

    public function dbConnect(){
        return new PDO("mysql:host=localhost;dbname=user_groups",'root','123456');
    }
}

 function include_page_header_content() {
	// INCLUDE CSS FILES
 	echo '<meta charset="utf-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
    echo '<link rel="stylesheet" type="text/css" href="assets/css/style.css">';
    echo '<link rel="stylesheet" type="text/css" href="../assets/css/style.css">';
    echo '<link href="../assets/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link href="assets/css/bootstrap.min.css" rel="stylesheet">'; 
	
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

                <div class="col-xs-2 col-md-2"></div>

                    <div class="col-xs-8 col-md-8 pbc_mt5">

                        <a class ="btn btn-primary" href="/user">Home</a>
                        <a class ="btn btn-primary" href="/user/views/view_list.php             ">   View Tables         </a>
                        <a class ="btn btn-primary" href="/user/views/view_group.php            ">   View Group          </a>
                        <a class ="btn btn-primary" href="/user/views/view_user.php             ">   View User           </a>
                        <a class ="btn btn-primary" href="/user/views/assign.php                ">   Map User            </a>
                        <a class ="btn btn-primary" href="/user/views/view_detail_types.php     ">   User Details Types  </a>

                    </div>

                <div class="col-xs-2 col-md-2"></div>

            </div> <!--end of div class row -->

            <div class="row">

                <div class="col-xs-2 col-md-2"></div>

                    <div class="col-xs-8 col-md-8 pbc_mt5">

                        <a class ="btn btn-primary" href="/user/views/create_user.php">Add User</a>
                        <a class ="btn btn-primary" href="/user/views/create_group.php">Add Group</a>
                        <!--<a class ="btn btn-primary" href="/user">...</a>
                        <a class ="btn btn-primary" href="/user">...</a>
                        <a class ="btn btn-primary" href="/user">...</a>
                        <a class ="btn btn-primary" href="/user">...</a>
                        -->
                        

                    </div>

                <div class="col-xs-2 col-md-2"></div>

            </div> <!--end of div class row below -->
';
}

function print_error_midscreen($error){
    if(isset($error)){
    $received_error = $error;
    echo '<br />';
    echo '<div class="row">';
    echo '<div class="col-xs-4 col-md-4"></div>';
    echo '<div class="col-xs-4 col-md-4">'.$received_error.'</div>';
    echo '<div class="col-xs-4 col-md-4"></div>';
    echo '</div>';
    }
}