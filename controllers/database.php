<?php

class Database{ // DEPRECATED !?!??! try with PDO .. ?  http://www.startutorial.com/articles/view/php-crud-tutorial-part-1 ?

    public function dbConnect(){
        return new PDO("mysql:host=localhost;dbname=user_groups",'root','123456');
    }

}

