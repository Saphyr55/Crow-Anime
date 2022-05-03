<?php

namespace CrowAnime\Core\Database;

use PDO;
use Throwable;

/**
 * Classe permetant la connexion à la base de donnée
 */
class Database
{
    private static ?Database $database = null;
    private static $pdo;
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $port;
    const SQLITE = 0;
    const MYSQL = 1;

    private function __construct()
    {
        $this->host = "localhost";
        $this->username = 'root';
        $this->password = '';
        $this->dbname = 'crow-anime';
        $this->port = '3306';
    }

    /**
     * Recupere l'unique instance de la base de donnée
     */
    public static function getDatabase(): ?Database
    {
        if (is_null(self::$database)) {
            self::$database = new Database();
        }
        return self::$database;
    }

    /**
     * Fait la connexion à la base de donnée
     */
    public function getPDO(): PDO
    {
        /*
        if (self::$pdo === null) {
            self::$pdo = new PDO(
                "sqlite:$_SERVER[DOCUMENT_ROOT]/crow-anime.sqlite",
            );
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        */
        //var_dump("mysql:host=".$this->host.';port='.$this->port.';dbname='.$this->dbname, $this->username, $this->password);

        if (self::$pdo === null) {
                self::$pdo = new PDO(
                    "mysql:host=".$this->host.';port='.$this->port.';dbname='.$this->dbname, $this->username, $this->password
                );
            }
        return self::$pdo;
    }

    /**
     * Permet l'insertion de donnée
     */
    public function execute(string $statement, array $datas = []): bool|array
    {
        $request = $this->getPDO()->prepare($statement);
        $request->execute($datas);
        return $request->fetchAll();
    }

    /**
     * Permet de recuperer des donner avec la requette sql mis en parametre
     *
     * @param string $statement
     * @return mixed
     */
    public function query(string $statement): array
    {
        try {
            $pdo_statement = $this->getPDO()->query($statement);
            $data = $pdo_statement->fetchAll(PDO::FETCH_OBJ);
            return (array)$data;
        } catch (Throwable $th) {
            error_log($th->getMessage());
            return [];
        }
    }
}
