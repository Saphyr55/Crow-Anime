<?php

namespace CrowAnime\Router;

use CrowAnime\Module;

class Router
{
    private array $modules;
    private static $currentModule;
    private Module $errorPage;


    public function __construct(array $modules, Module $errorPage)
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
        for ($i = 0; $i < count($this->modules); $i++) {

            self::$currentModule = $this->modules[$i];

            if (
                strcmp($uri, '/' . self::$currentModule->getNameModule()) === 0
            ) {

                self::$currentModule->generate();
                break;
            } elseif (strcmp($uri, '/' . self::$currentModule->getNameModule() . '/') === 0) {

                header('Location: ' . substr($uri, 0, -1)); // redirection si l'uri termine par /
                break;
            } elseif (strcmp($uri, "/") == 0) {

                ($this->modules[0])->generate($this->modules[0]);
                break;
            } elseif (
                ($i == (count($this->modules) - 1))
            ) {
                 error_log("Error : " . $uri . " not found");
                 $this->errorPage->generate($this->errorPage);
                 break;
            }
        }
    }
}
