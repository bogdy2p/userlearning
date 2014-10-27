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
                         <!--<li><a href="/user/views/assign.php                ">   Map User            </a></li>-->
                             <li><a href="/user/views/view_detail_types.php     ">   User Details Types  </a></li>
                             <li><a href="/user/views/create_user.php           ">   Add User            </a></li>
                             <li><a href="/user/views/create_group.php          ">   Add Group           </a></li>
                             <li><a href="/user/views/view_logs.php             ">   View App Logs       </a></li>
                             <li><a href="/user/views/view_changelogs.php             ">   View CHANGELOGS       </a></li>

                        </ul>
                
                    </div><!-- /.navbar-collapse -->
                    
                </div>
            </nav>
';
}



function print_to_do_list(){
    echo'
                <ol>
                    <li><h3><spanred>Function CREATE in class CRUD must be modified. So as functions create USER and GROUPS from their own classes.</spanred></h3></li>
                    <li><h6><spanred>ADD FUNCTIONALITY TO EDIT USER CORRESPONDING DETAILS phone , etc ,, for each detail type availlable (must be DYNAMIC)</spanred></h6></li>
                    <li><h6><spanred>THE REST of the FIX the responsiveness of the website...</spanred></h6></li>
                    <li><h5><spanred><b>Jquery CHECK USERNAME exists already (when creating a new user) in the database. (front-end validation)</b></spanred></h5></li>
                    <li><h5><spanyel>@ create_group_view - display group entries from groups table for the user to see what groups already exist</spanyel></h5></li>
                    <li><h6><spanyel>When creating a new user , save the user\'s account CREATION TIME. (into new table... LOG ?)</spanyel></h6></li>
                    <li><h5><spanred>AJAX / Jquery @ editing user </spanred></h5></li>
                    <li><h6><spanyel>PRINT DATABASE STATISTICS as : how many programmers, how many users in total , how many designer , how many X.</spanyel></h6>  </li>
                    <li><h6><spangre>Print "last created user";</spangre></h6></li>
                    <li><h6><spangre>Print User with most details entered</spangre></h6></li>
                    <li><h5><spanred>Create a changelog for this application , that saves changes to db</spanred></h5></li>
                    <li><h6><spanred>EMPTY EMPTY EMPTY</spanred></h6></li>
                    <li><h6><spanred>If i remain without stuff to do , and nothing new appears : Create a changelog for this application , that saves changes to db</spanred></h6></li>
                </ol>    

                <!--
                    RED :
                    <li><h6><spanred></spanred></h6></li>
                    YELLOW :
                    <li><h6><spanyel></spanyel></h6></li>
                    GREEN :
                    <li><h6><spangre></spangre></h6></li>                  
                -->                  
                
    ';
}
