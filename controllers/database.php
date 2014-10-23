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
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>';
}

function print_sitewide_menu(){
    echo'   

            <div class="row">
                <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo">
                        simple collapsible
                </button>
                <div id="demo" class="collapse in">...</div>

             </div>

            <nav class="navbar navbar-default" role="navigation">

                <div class="container-fluid">
                    <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>        

                            <a class="navbar-brand" href="/user">Home</a>
                            <a class="navbar-brand" href="/user">Homedsa</a>
                    </div>                            

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                         
                             <li><a href="/user/views/view_list.php             ">   View Tables         </a></li>
                             <li><a href="/user/views/view_group.php            ">   View Group          </a></li>
                             <li><a href="/user/views/view_user.php             ">   View User           </a></li>
                             <li><a href="/user/views/assign.php                ">   Map User            </a></li>
                             <li><a href="/user/views/view_detail_types.php     ">   User Details Types  </a></li>
                             <li><a href="/user/views/create_user.php           ">   Add User            </a></li>
                             <li><a href="/user/views/create_group.php          ">   Add Group           </a></li>

                        </ul>
                
                    </div><!-- /.navbar-collapse -->
                    
                </div>
            </nav>
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
