<?php

class Database
{ 
    
    private static $database = null;
    private $pdo = null;
    private static $connection_file = '/assets/data/connection.json';

    public function __construct()
    {
        if (file_exists(self::$connection_file)) 
        {
            $data_connection = file_get_contents(self::$connection_file);
            
            $connection = json_decode($data_connection);
            $host = $connection->host;
            $username = $connection->username;
            $password = $connection->password;
            $dbname = $connection->dbname;
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } 
    }

    public static function getDatabase()
    {
        if(is_null(self::$database))
        {
            self::$database = new Database;
        }
        return self::$database;
    }

    public function getPDO() 
    {   
        return $this->pdo; 
    }

}