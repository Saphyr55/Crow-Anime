<?php

namespace CrowAnime;

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Backend\User;
use CrowAnime\Frontend\Body;

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

        $uri = $_SERVER['REQUEST_URI'];
        for ($i = 0; $i < count($this->modules); $i++) {

            self::$currentModule = $this->modules[$i];
            self::$currentHead   = self::$currentModule->getHead();
            self::$currentBody   = self::$currentModule->getBody();

            if (
                strcmp($uri, '/' . self::$currentModule->getNameModule()) === 0
            ) {

                self::putCurrentFileContent(self::$currentModule);
                break;
            } elseif (strcmp($uri, '/' . self::$currentModule->getNameModule() . '/') === 0) {

                header('Location: ' . substr($uri, 0, -1)); // redirection si l'uri termine par un slash
                break;
            } elseif (strcmp($uri, "/") == 0) {

                self::putCurrentFileContent($this->modules[0]);
                break;
            } elseif (
                ($i == (count($this->modules) - 1))
            ) {

                if ($this->errorPage !== null) {
                    error_log("Error : $uri not found");
                    self::putCurrentFileContent($this->errorPage);
                    break;
                }
            }
        }

        return $this;
    }

    public static function checkProfileURI()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if (strcmp(explode('/', $uri)[1], 'profile') === 0 ||
            strcmp(explode('/', $uri)[1], 'admin') === 0 ) {

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
     * Permet de d'afficher le code php|html en fonction du module
     *
     * @param  Module $currentModule
     */
    private static function putCurrentFileContent(Module $currentModule): void
    {
        file_put_contents(Rules::RULES_PATH, $currentModule->getRules()->sendRules());
        file_put_contents(Head::_HEAD_PATH_, $currentModule->getHead()->sendHTML());
        file_put_contents(Body::_BODY_PATH_, $currentModule->getBody()->sendHTML());

        require Rules::RULES_PATH;
        require Head::_HEAD_PATH_;
        require Body::_BODY_PATH_;
    }

    /**
     * Get the value of actualURI
     */
    public function getActualURI()
    {
        return $this->actualURI;
    }

    /**
     * Set the value of actualURI
     *
     * @return  self
     */
    public function setActualURI($actualURI)
    {
        $this->actualURI = $actualURI;

        return $this;
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
