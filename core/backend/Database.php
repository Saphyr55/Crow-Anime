<?php

use \PDO;

/**
 * Classe permetant la connexion à la base de donnee
 */
class Database
{ 
    
    private static $connection_file = '../../assets/data/connection.json';
    private static $database = null;
    private $pdo;
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

    /**
     * Get the value of pdo
     */ 
    private function getPDO()
    {
        if ($this->pdo === null) 
        {
            $pdo = new PDO
            (
                "mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password
            );
            $this->pdo = $pdo;
        }
        return $pdo;
    }

    public function request(string $statement)
    {
        $pdo_statement = $this->getPDO()->query($statement);
        $datas = $pdo_statement->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }
}