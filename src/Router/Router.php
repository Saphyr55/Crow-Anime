<?php

namespace CrowAnime\Router;

use CrowAnime\Core\Errors\Error;
use CrowAnime\Module;

class Router
{
    private ?array $modules;
    private Module $errorPage;
    private static ?Module $currentModule = null;

    public function __construct(?array $modules, Module $errorPage)
    {
        $this->modules = $modules;
        $this->errorPage = $errorPage;
    }

    /**
     * affiche la page correspondante avec les nom des modules qui est m'y dans l'url
     * 
     * Exemple : http://localhost:5050/<nameModule>/ 
     * le slash est enlever si il trouve que le <nameModule> existe
     * 
     * Si il y a rien met la page d'accuiel correspondant au premier module
     * Si le nameModule n'existe pas, affiche la page d'erreur 404
     */
    public function generateAllRoutes(): void
    {
        $uri = explode("?", $_SERVER['REQUEST_URI'])[0];
        if (!strcmp(explode('/', $uri)[1], 'phpmyadmin'))
            return;

        for ($i = 0; $i < count($this->modules); $i++) {

            if ((self::$currentModule = $this->modules[$i]) !== null) {
                if (!strcmp($uri, '/' . self::$currentModule->getNamePathModule())) {
                    self::$currentModule->generate();
                    exit();
                } elseif (!strcmp($uri, '/' . self::$currentModule->getNamePathModule() . '/')) {

                    header('Location: ' . substr($uri , 0, -1)); // redirection si l'uri termine par /
                    exit();
                } elseif (!strcmp($uri, "/")) { // home module generate

                    $this->modules[0]->generate($this->modules[0]);
                    exit();
                }
            }
            elseif (
                ($i == (count($this->modules) - 1))
            ) {
                Error::set('404 Page Not Found');
                $this->errorPage->generate();
                exit();
            }
        }
    }

    /**
     * @param string $URI
     */
    public static function saveURI(string $URI): void
    {
        if (isset($_COOKIE['url_b'])) {
            unset($_COOKIE['url_b']);
            setcookie('url_b', $URI, time()+86400, '/');
        }
    }

    /**
     * @return string
     */
    public static function uri() : string
    {
        return htmlspecialchars_decode($_COOKIE['url_b']);
    }

}
