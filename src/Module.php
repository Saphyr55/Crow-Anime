<?php

namespace CrowAnime;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Component;

/**
 * Class Module
 * 
 * Permet de contenir le contenu d'une page html (head et body)
 */
class Module implements Component
{
    protected Head $head;
    protected Body $body;
    protected string $redirectionURI;
    protected string $nameModule = "";
    protected Rules $rules;
    protected ?Controller $controller;

    /**
     * @param string $nameModule
     * @param Head $head
     * @param Body $body
     * @param Rules $rules
     * @param Controller|null $controller
     */
    public function __construct(string $nameModule, Head $head, Body $body, Rules $rules, ?Controller $controller = null)
    {
        $this->nameModule = $nameModule;
        $this->redirectionURI = "http://$_SERVER[HTTP_HOST]/$nameModule";
        $this->head = $head;
        $this->body = $body;
        $this->rules = $rules;
        $this->controller = $controller;
    }

    /**
     * Permet de generer le code php|html en fonction d'un module
     */
    public function generate() : void
    {
        $body = $this->getBody();
        $this->getRules()->check();
        if ($this->getBody()->getFooter() !== null && $this->getBody()->getHeader() !== null){
            $controller_header = $body->getHeader()->getController();
            $controller_footer = $body->getFooter()->getController();
            if ($controller_header !== null &&
                $controller_footer !== null)
            {
                $controller_header->action();
                $controller_footer->action();
                extract($controller_footer->getData());
                extract($controller_footer->getStrings());
                extract($controller_header->getData());
                extract($controller_header->getStrings());
            }
        }

        if ($this->controller !== null){

            $this->controller->action();
            extract($this->controller->getData());
            extract($this->controller->getStrings());
        }

        foreach ($this->getHead()->sendHTML() as $value)
            echo $value;

        if ($body->getHeader() !== null)
            require $body->getHeader()->getPathHeader();

        require $body->getPathComponent();

        if ($body->getFooter() !== null)
            require $body->getFooter()->getPathFooter();
    }

    /**
     * Get the value of head
     *
     * @return Head $head
     */
    public function getHead(): Head
    {
        return $this->head;
    }

    /**
     * Get the value of body
     *
     * @return Body $body
     */
    public function getBody(): Body
    {
        return $this->body;
    }


    /**
     * Get the value of redirectionURI
     * 
     * @return string $redirectionURI
     */
    public function getRedirectionURI(): string
    {
        return $this->redirectionURI;
    }

    /**
     * Set the value of redirectionURI
     *
     * @return self $this
     */
    public function setRedirectionURI($redirectionURI): self
    {
        $this->redirectionURI = $redirectionURI;

        return $this;
    }

    /**
     * Get the value of nameModule 
     * 
     * @return string $nameModule
     */
    public function getNameModule(): string
    {
        return $this->nameModule;
    }

    /**
     * Get the value of rules
     */
    public function getRules(): Rules
    {
        return $this->rules;
    }
}
