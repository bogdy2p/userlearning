<?php

class Database{

    public function dbConnect(){
        return new PDO("mysql:host=localhost;dbname=user_groups",'root','123456');
    }
}