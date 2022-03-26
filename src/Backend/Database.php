<?php

namespace CrowAnime\Backend;

use PDO;

/**
 * Classe permetant la connexion à la base de donnée
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
        $connection_file = $_SERVER["DOCUMENT_ROOT"] . '/assets/data/connection.json';
        if (file_exists($connection_file)) {
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
        if (is_null(self::$database)) {
            self::$database = new Database;
        }
        return self::$database;
    }

    /**
     * Fait la connexion à la base de donnée
     */
    private function getPDO()
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    $this->username,
                    $this->password
                );
        }
        return self::$pdo;
    }

    /**
     * Permet l'insertion de donnée
     */
    public function execute(string $statement, array $datas)
    {
        $request = $this->getPDO()->prepare($statement);
        $request->execute($datas);
    }


    /**
     * Permet de recuper le dernier enregistrement
     *
     * @param  string $table
     * @param  string $colID
     * @return mixed
     */
    public function lastRegister(string $table, string $colID)
    {
        return self::$database->query(
            "SELECT * FROM $table
            ORDER BY $colID DESC LIMIT 1"
        );
    }

    /**
     * Permet de recuperer des donner avec la requette sql mis en parametre 
     *
     * @param  string $statement
     * @return mixed
     */
    public function query(string $statement) : array|null
    {
        $pdo_statement = $this->getPDO()->query($statement);
        if ($pdo_statement !== false) {
            $datas = $pdo_statement->fetchAll(PDO::FETCH_OBJ);
            if ($datas !== false) {
                return (array) $datas;
            } else return null;
        } else return null;
    }
}
