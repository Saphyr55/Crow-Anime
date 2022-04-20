<?php

namespace CrowAnime;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\User;
use CrowAnime\Router\Router;

/**
 * Classe App
 * 
 * L'application permet de faire afficher les pages correspondantes 
 * en fonction des modules mis en parametre lors de l'instance
 * 
 */
class App
{
    private array $modules;
    private string $actualURI;
    private Module $errorPage;
    private Router $router;

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
     *  
     * @return self
     */
    public function run(): self
    {   
        $this->router = new Router($this->modules, $this->errorPage);
        $this->router->generateAllRoutes();
        return $this;
    }

    public static function checkProfileURI(): void
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
     * Get the value of actualURI
     */
    public function getActualURI(): string
    {
        return $this->actualURI;
    }

    /**
     * Get the value of errorPage
     */
    public function getErrorPage(): Module
    {
        return $this->errorPage;
    }

    /**
     * Get the value of router
     */ 
    public function getRouter(): Router
    {
        return $this->router;
    }
}
