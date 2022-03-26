<?php

namespace CrowAnime\Backend;

use DateTime;

class User
{
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
    public function __construct(string $username, string $email, string $password, bool $isAdmin, DateTime $dateConnection, DateTime $dateRegister)
    {
        $this->username = $username;
        $this->email = $email;
        $this->passwod = $password;
        $this->isAdmin = $isAdmin;
        $this->dateConnection = $dateConnection;
        $this->dateRegister = $dateRegister;
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
    public function getIsAdmin(): bool
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
}
