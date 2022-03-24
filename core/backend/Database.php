<?php

namespace Backend;

use \PDO;

/**
 * Classe permetant la connexion à la base de donnee
 */
class Database
{ 
    private static $database = null;
    private static $pdo;
    private $host;
    private $username;
    private $password;
    private $dbname;

    private function __construct()
    {   
        $connection_file = $_SERVER["DOCUMENT_ROOT"].'/assets/data/connection.json';
        if (file_exists($connection_file)) 
        {
            $data_connection = file_get_contents($connection_file);
            
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
     * Fait la connexion à la base de donnée
     */ 
    private function getPDO()
    {
        if (self::$pdo === null) 
        {
            self::$pdo = new PDO
            (
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->username, $this->password
            );
        }
        return self::$pdo;
    }

    public function execute(string $statement, ?array $datas) 
    {
        $request = $this->getPDO()->prepare($statement);
        $request->execute($datas);
    }

    public function lastRegister(string $table)
    {
        return self::$database->query(
            'SELECT * FROM `anime`
            ORDER BY `id_anime` DESC LIMIT 1;'
        );
    }

    public function query(string $statement)
    {
        $pdo_statement = $this->getPDO()->query($statement);
        $datas = $pdo_statement->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }
}