<?php

namespace CrowAnime;

use CrowAnime\Core\Controllers\Auths\LogoutController;
use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Errors\Error;
use CrowAnime\Modules\Components\Component;
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
    private Component $errorPage;
    private Router $router;

    /**
     * __construct
     *
     * @param  array $modules
     * @param  Module $errorPage
     */
    public function __construct(Module $errorPage, Module ...$modules)
    {   
        $this->errorPage = $errorPage;
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

    public static function start(): void
    {
        session_start();
        User::setUserURI();
        if (strcmp($_SERVER['REQUEST_URI'], '/logout'))
            Router::saveURI($_SERVER['REQUEST_URI']);
    }

    /**
     * Get the value of errorPage
     */
    public function getErrorPage(): Component
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
