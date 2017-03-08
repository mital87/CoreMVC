<?php

class Database {
    
    public function databasesql()
    {
        $db = new PDO('mysql:host=localhost;dbname=management;charset=utf8mb4', 'root', '');
        return $db;
    }
}

