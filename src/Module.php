<?php

namespace CrowAnime;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Path;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Component;
use CrowAnime\Template\FunctionsTemplate;

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
    protected Rules $rules;
    protected ?Controller $controller;
    protected string $namePathModule;

    /**
     * @param string $namePathModule
     * @param ?Head $head
     * @param ?Body $body
     * @param Rules $rules
     * @param Controller|null $controller
     */
    public function __construct(string $namePathModule, ?Head $head, ?Body $body, Rules $rules, ?Controller $controller = null)
    {
        $this->namePathModule = $namePathModule;
        $this->head= $head;
        $this->body = $body;
        $this->redirectionURI = "http://$_SERVER[HTTP_HOST]/$namePathModule";
        $this->rules = $rules;
        $this->controller = $controller;
    }

    /**
     * Permet de generer le code php|html en fonction d'un module
     */
    public function generate() : void
    {
        extract((new FunctionsTemplate())->getFunctions());
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

        foreach ($this->getHead()->getContentHead() as $value)
            echo $value;
        echo "<body>\n";
        if ($body->getHeader() !== null)
            require $body->getHeader()->getPathHeader();

        require $body->getPathComponent();

        if ($body->getFooter() !== null)
            require $body->getFooter()->getPathFooter();
        echo "</body>\n";

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
    public function getNamePathModule(): string
    {
        return $this->namePathModule;
    }

    /**
     * Get the value of rules
     */
    public function getRules(): Rules
    {
        return $this->rules;
    }
}
