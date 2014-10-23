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
    echo '<link href="../assets/css/bootstrap-theme.min.css" rel="stylesheet">';
    echo '<link href="assets/css/bootstrap.min.css" rel="stylesheet">';
    echo '<link href="assets/css/bootstrap-theme.min.css" rel="stylesheet">';
    
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
    echo '<div class="col-xs-12 col-md-4"></div>';
    echo '<div class="col-xs-12 col-md-4">'.$received_error.'</div>';
    echo '<div class="col-xs-12 col-md-4"></div>';
    echo '</div>';
    }
}


function print_latest_work_list(){
    echo '  <ol>
                    <li><h4><spanred>Added Map Groups to user by "checkbox..."</spanred></h4></li>
                    <li><h4><spanyel>Fixed map groups by checkbox without changing the user password</spanyel></h4></li>
                    <li><h4><spanyel>Fixed the bootstrap javascript including (wasn\'t working)</spanyel></h4></li>
                    <li><h4><spanyel>Removed the old menu ,added a responsive navigation menu </spanyel></h4></li>
                    <li><h4><spangre>Fixed the site template (The menu and the content have now the same width across all pages)</spangre></h4></li>
                    <li><h4><spanyel>Implemented print user_details_table & formatted</spanyel></h4></li>
                    <li><h4><spanred>Implemented Add New Detail Form & Functionality</spanred></h4></li>
                    <li><h4><spanred>Added options to delete and edit each detail type + Functionality </spanred></h4></li>
                    <li><h4><spangre> Reorganized CRUD</spangre></h4></li>
                    <li><h4><spanred>50% of the FIX the responsiveness of the website...</spanred></h4></li>
                    <li><h4><spanred>View User Detail Types Page and Functionality</spanred></h4></li>
                    <li><h3><spanred>FIX TABLE VIEW USERS RESP. BUTTONS to Glyphs</spanred></h3></li>
                    
            </ol>
    ';
}

function print_to_do_list(){
    echo'
                <ol>
                    <li><h2><spanred>CRITICAL : REMOVE user_details entries for the user when deleting a user ! </spanred></h2></li>
                    <li><h5><spanred>THE REST of the FIX the responsiveness of the website...</spanred></h5></li>
                    <li><h3><spanyel>view_detail_types.php RESPONSIVNESSS </spanyel></h3></li>
                    <li><h5><spanred>View User Detail Types Page and Functionality</spanred></h5></li>
                    <li><h5><spanyel>When creating a new user , save the user\'s account CREATION TIME. (into new table... LOG ?)</spanyel></h5></li>
                    <li><h5><spanyel>AJAX / Jquery @ editing user </spanyel></h5></li>
                    <li><h5><spanyel>PRINT DATABASE STATISTICS as : how many programmers, how many users in total , how many designer , how many X.</spanyel></h5>  </li>
                    <li><h5><spangre>Print "last created user";</spangre></h5></li>
                    <li><h5><spanyel>Print User with most details entered</spanyel></h5></li>
                    <li><h4><spanred></spanred></h4></li>
                </ol>
    ';
}