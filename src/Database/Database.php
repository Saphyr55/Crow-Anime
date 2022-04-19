<?php

namespace CrowAnime\Database;

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
            self::$database = new Database();
        }
        return self::$database;
    }

    /**
     * Fait la connexion à la base de donnée
     */
    public function getPDO()
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO(
                    "sqlite:$_SERVER[DOCUMENT_ROOT]/crow-anime.sqlite",
                );
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }

    /**
     * Permet l'insertion de donnée
     */
    public function execute(string $statement, array $datas = [])
    {
        $request = $this->getPDO()->prepare($statement);
        $request->execute($datas);
        return $request->fetchAll();
    }

    /**
     * Permet de recuperer des donner avec la requette sql mis en parametre 
     *
     * @param  string $statement
     * @return mixed
     */
    public function query(string $statement) : array
    {
        try {
            $pdo_statement = $this->getPDO()->query($statement);
            $datas = $pdo_statement->fetchAll(PDO::FETCH_OBJ);
            return (array) $datas;
        } catch (\Throwable $th) {
            error_log($th->getMessage());
            return [];
        }
    }
}
