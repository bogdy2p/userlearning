<?php

class Database{

    public function dbConnect(){
        return new PDO("mysql:host=localhost;dbname=user_groups",'root','123456');
    }
}

function print_to_do_list(){
    echo'
                <ol>
                    <li><h5><spanred><b>Jquery CHECK USERNAME exists already (when creating a new user) in the database. (front-end validation)</b></spanred></h5></li>
                    <li><h5><spanyel>@ create_group_view - display group entries from groups table for the user to see what groups already exist</spanyel></h5></li>
                    <li><h5><spanred>AJAX / Jquery @ editing user (if changing username , not to be able to select an already existing username) </spanred></h5></li>
                    <li><h6><spanyel>TO_DO_LIST implementation (view,edit,delete,update)(not hardcoded like now)</spanyel></h6></li>
                    <li><h6><spangre>PRINT DATABASE STATISTICS as : how many programmers, how many users in total , how many designer , how many X.</spangre></h6>  </li>
                    <li><h6><spangre>Print "last created user";</spangre></h6></li>
                    <li><h6><spangre>Print User with most details entered</spangre></h6></li>
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