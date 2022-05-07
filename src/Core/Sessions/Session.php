<?php

namespace CrowAnime\Core\Sessions;

class Session
{

    private static array $idSessions = [];
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
        self::$idSessions[] = $id;
    }

    public static function start() : void
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
            if (session_id() === null)
                $_SESSION['session'] = new Session(session_create_id());
            else
                $_SESSION['session'] = new Session(session_id());
        }
    }

    /**
     * @return array
     */
    public static function getIdSessions(): array
    {
        return self::$idSessions;
    }

    /**
     * @param array $idSessions
     */
    public static function setIdSessions(array $idSessions): void
    {
        self::$idSessions = $idSessions;
    }

    public static function getSession() : Session
    {
        return $_SESSION['session'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }


}