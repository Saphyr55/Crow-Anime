<?php

namespace CrowAnime;

use CrowAnime\Database\Database;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Core\User;
use CrowAnime\Core\Module;

/**
 * Classe App
 * 
 * L'application permet de faire afficher les pages correspondantes 
 * en fonction des modules mis en parametre lors de l'instance
 * 
 */
class App
{
    private $modules;
    private $actualURI;
    private $errorPage;
    private static $currentPage;
    private static $currentModule;
    private static $currentHead;
    private static $currentBody;

    /**
     * __construct
     *
     * @param  array $modules
     * @param  Module $errorPage
     */
    public function __construct(array $modules, Module $errorPage)
    {
        $this->errorPage = $errorPage;
        $this->actualURI = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $this->modules = $modules;
    }


    /**
     * Lance l'application en recuperant tous les modules
     * Et affiche la page correspondante avec les nom des modules qui est m'y dans l'url
     * 
     * Exemple : http://localhost:5050/<nameModule>/ 
     * le slash est enlever si il trouve que le <nameModule> existe
     * 
     * Si il y a rien met la page d'accuiel correspondant au premier module
     * Si le nameModule n'existe pas, affiche la page d'erreur not found
     *  
     * @return self
     */
    public function run(): self
    {
        $uri = explode("?", $_SERVER['REQUEST_URI'])[0];
        for ($i = 0; $i < count($this->modules); $i++) {

            self::$currentModule = $this->modules[$i];
            self::$currentHead   = self::$currentModule->getHead();
            self::$currentBody   = self::$currentModule->getBody();

            if (
                strcmp($uri, '/' . self::$currentModule->getNameModule()) === 0
            ) {

                self::generate(self::$currentModule);
                break;
            } elseif (strcmp($uri, '/' . self::$currentModule->getNameModule() . '/') === 0) {

                header('Location: ' . substr($uri, 0, -1)); // redirection si l'uri termine par /
                break;
            } elseif (strcmp($uri, "/") == 0) {

                self::generate($this->modules[0]);
                break;
            } elseif (
                ($i == (count($this->modules) - 1))
            ) {

                if ($this->errorPage !== null) {
                    error_log("Error : " . $uri . " not found");
                    self::generate($this->errorPage);
                    break;
                }
            }
        }

        return $this;
    }

    public static function checkProfileURI()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (
            strcmp(explode('/', $uri)[1], 'profile') === 0 ||
            strcmp(explode('/', $uri)[1], 'admin') === 0
        ) {

            $theoricUser = explode('/', $uri)[2];

            $users = Database::getDatabase()->query(
                "SELECT username FROM _user"
            );

            foreach ($users as $user) {

                $user = (array) $user;

                if (strcmp($theoricUser, $user['username']) === 0)
                    User::setCurrentUsernameURI($theoricUser);
            }
        }
    }

    /**
     * Permet de generer le code php|html en fonction du module
     *
     * @param  Module $currentModule
     */
    private static function generate(Module $currentModule)
    {
        $currentModule->getRules()->check();

        $body = $currentModule->getBody();

        if (file_exists($currentModule->getConfig()->getPathConfig()))
            require $currentModule->getConfig()->getPathConfig();

        foreach ($currentModule->getHead()->sendHTML() as $value)
            echo $value;

        if ($body->getHeader() !== null)
            require $body->getHeader()->getPathHeader();

        require $body->getPathComponent();

        if ($body->getFooter() !== null)
            require $body->getFooter()->getPathFooter();
    }

    /**
     * Get the value of actualURI
     */
    public function getActualURI()
    {
        return $this->actualURI;
    }

    /**
     * Get the value of currentPage
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * Set the value of currentPage
     *
     * @return  self
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;

        return $this;
    }

    /**
     * Get the value of errorPage
     */
    public function getErrorPage()
    {
        return $this->errorPage;
    }

    /**
     * Set the value of errorPage
     *
     * @return  self
     */
    public function setErrorPage($errorPage)
    {
        $this->errorPage = $errorPage;

        return $this;
    }

    /**
     * Get the value of currentHead
     */
    public function getCurrentHead()
    {
        return $this->currentHead;
    }

    /**
     * Set the value of currentHead
     *
     * @return  self
     */
    public function setCurrentHead($currentHead)
    {
        $this->currentHead = $currentHead;

        return $this;
    }

    /**
     * Get the value of currentBody
     */
    public function getCurrentBody()
    {
        return $this->currentBody;
    }

    /**
     * Set the value of currentBody
     *
     * @return  self
     */
    public function setCurrentBody($currentBody)
    {
        $this->currentBody = $currentBody;

        return $this;
    }
}
