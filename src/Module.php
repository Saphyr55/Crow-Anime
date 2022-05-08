<?php

namespace CrowAnime;

use CrowAnime\Components\Body;
use CrowAnime\Components\Component;
use CrowAnime\Components\Head;
use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Template\FunctionsTemplate;

/**
 * Class Module
 * 
 * Permet de contenir le contenu d'une page html (head et body) et page genere en fonction de la route
 * La page est generé avec la view rentrer dans le body
 */
class Module implements Component
{
    protected ?Head $head;
    protected ?Body $body;
    protected string $redirectionURI;
    protected Rules $rules;
    protected ?Controller $controller;
    protected string $route;

    /**
     * @param string $route
     * @param ?Head $head
     * @param ?Body $body
     * @param Rules $rules
     * @param Controller|null $controller
     */
    public function __construct(string $route, ?Head $head, ?Body $body, Rules $rules, ?Controller $controller = null)
    {
        $this->route = $route;
        $this->head= $head;
        $this->body = $body;
        $this->redirectionURI = "http://$_SERVER[HTTP_HOST]/$route";
        $this->rules = $rules;
        $this->controller = $controller;
    }

    /**
     * Permet de generer la page en fonction d'un module
     * Extrait toutes les variables creer depuis le controlleur
     * et toutes les fonctions de FunctionsTemplate.
     */
    public function generate() : void
    {
        extract((new FunctionsTemplate())->getFunctions());
        $body = $this->getBody();
        $this->getRules()->check();
        if ($body !== null) {
            if ($body->getFooter() !== null && $body->getHeader() !== null) {
                $controller_header = $body->getHeader()->getController();
                $controller_footer = $body->getFooter()->getController();
                if ($controller_header !== null &&
                    $controller_footer !== null) {
                    $controller_header->action();
                    $controller_footer->action();
                    extract($controller_footer->getData());
                    extract($controller_footer->getStrings());
                    extract($controller_header->getData());
                    extract($controller_header->getStrings());
                }
            }
        }

        if ($this->controller !== null){
            $this->controller->action();
            extract($this->controller->getData());
            extract($this->controller->getStrings());
        }

        if ($this->getHead() !== null) {
            foreach ($this->getHead()->getContentHead() as $value)
                echo $value;
        }

        if ($body !== null) {
            echo "<body>\n";

            if ($body->getHeader() !== null)
                require $body->getHeader()->getPathHeader();

            require $body->getPathComponent();

            if ($body->getFooter() !== null)
                require $body->getFooter()->getPathFooter();

            echo "<body>\n";
        }
    }

    /**
     * Get the value of head
     *
     * @return Head $head
     */
    public function getHead(): ?Head
    {
        return $this->head;
    }

    /**
     * Get the value of body
     *
     * @return ?Body $body
     */
    public function getBody(): ?Body
    {
        return $this->body;
    }


    /**
     * Get the value of redirectionURI
     * 
     * @return string $redirectionURL
     */
    public function getURL(): string
    {
        return $this->redirectionURI;
    }

    /**
     * Get the value of nameModule 
     * 
     * @return string $nameModule
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * Get the value of rules
     */
    public function getRules(): Rules
    {
        return $this->rules;
    }
}
