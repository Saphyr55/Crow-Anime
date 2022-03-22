<?php

/**
 * Classe permetant la connection a la base de donnee
 */
class Database
{ 
    
    private static $connection_file = '/assets/data/connection.json';
    private static $database = null;
    private $pdo = null;
    private $host;
    private $username;
    private $password;
    private $dbname;

    /**
     * Fait la connection a la base de donnée
     */
    private function __construct()
    {
        if (file_exists(self::$connection_file)) 
        {
            $data_connection = file_get_contents(self::$connection_file);
            
            $connection = json_decode($data_connection);
            $this->host = $connection->host;
            $this->username = $connection->username;
            $this->password = $connection->password;
            $this->dbname = $connection->dbname;
            $this->pdo = new PDO
            (
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->username,
                $this->password
            );
        } 
    }
    
    /**
     * Recupere l'unique instance de la base de donnée
     */
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

    public function getHost()
    {
        return $this->host;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getDBName()
    {
        return $this->dbname;
    }
}