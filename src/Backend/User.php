<?php

namespace CrowAnime\Backend;

use DateTime;

class User
{      
    private static array $usersConnected = [];
    private static ?string $currentUsernameURI = null;
    private int $idUser;
    private string $username;
    private string $email;
    private string $password;
    private bool $isAdmin;
    private DateTime $dateConnection;
    private DateTime $dateRegister;

    /**
     *
     * @param  string $username
     * @param  string $email
     * @param  string $password
     * @param  bool $isAdmin
     * @param  DateTime $dateConnection
     * @param  DateTime $dateRegister
     * @return void
     */
    public function __construct(int $idUser, string $username, string $email, string $password, bool $isAdmin, DateTime $dateConnection, DateTime $dateRegister)
    {   
        $this->idUser = $idUser;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->isAdmin = $isAdmin;
        $this->dateConnection = $dateConnection;
        $this->dateRegister = $dateRegister;
        array_push(self::$usersConnected, $this);
    }


    /**
     * Get the value of dateConnection
     */
    public function getDateConnection(): DateTime
    {
        return $this->dateConnection;
    }

    /**
     * Set the value of dateConnection
     *
     * @param DateTime $dateConnection
     * @return  self
     */
    public function setDateConnection($dateConnection): self
    {
        $this->dateConnection = $dateConnection;

        return $this;
    }

    /**
     * Get the value of isAdmin
     */
    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @param  bool $isAdmin
     * @return  self
     */
    public function setIsAdmin($isAdmin): self
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of dateRegister
     */
    public function getDateRegister()
    {
        return $this->dateRegister;
    }

    /**
     * Set the value of dateRegister
     *
     * @return  self
     */
    public function setDateRegister($dateRegister)
    {
        $this->dateRegister = $dateRegister;

        return $this;
    }

    /**
     * Get the value of currentUsernameURI
     */
    public static function getCurrentUsernameURI() : ?string
    {
        return self::$currentUsernameURI;
    }

    /**
     * Set the value of currentUsernameURI
     */ 
    public static function setCurrentUsernameURI(?string $currentUsernameURI)
    {
        self::$currentUsernameURI = $currentUsernameURI;
    }



    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Get the value of usersConnected
     */ 
    public static function getUsersConnected()
    {
        return self::$usersConnected;
    }

    public static function getCurrentUser()
    {
        return $_SESSION['user'];
    }
}
