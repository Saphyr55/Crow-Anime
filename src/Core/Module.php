<?php

namespace CrowAnime\Core;

use CrowAnime\Core\Config\Config;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Core\IComponent;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

/**
 * Class Module
 * 
 * Permet de contenir le contenu d'une page html (head et body)
 */
class Module implements IComponent
{
    
    private Head $head;
    private Body $body;
    private string $redirectionURI;
    private string $nameModule;
    private Rules $rules;
    private Config $config;

    /**
     *  
     * @param  string $nameModule
     * @param  Head $head
     * @param  Body $body
     * @param  Rules $rules
     * @return void
     */
    public function __construct(string $nameModule, Head $head, Body $body, Rules $rules)
    {
        $this->nameModule = $nameModule;
        $this->redirectionURI = "http://$_SERVER[HTTP_HOST]/$nameModule";
        $this->head  = $head;
        $this->body  = $body;
        $this->rules = $rules;
        $this->config = new Config($this->nameModule);;
    }

    /** 
     * Renvoi le body et le head dans un tableau
     *
     * @return string|array
     */
    public function sendHTML(): string|array
    {   
        return [
            "rules" => $this->rules->sendRules(),
            "head" => $this->head->sendHTML(),
            "body" => $this->body->sendHTML()
        ];
    }

    /**
     * Get the value of head
     *
     * @return Head $head
     */
    public function getHead() : Head
    {
        return $this->head;
    }

    /**
     * Set the value of head
     *
     * @param Header $head 
     * @return Module $this
     */
    public function setHead(Header $head) : Module
    {
        $this->head = $head;

        return $this;
    }

    /**
     * Get the value of body
     *
     * @return Body $body
     */
    public function getBody() : Body
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @param Body $body
     * @return Module $this
     */
    public function setBody(Body $body) : Module
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the value of redirectionURI
     * 
     * @return string $redirectionURI
     */
    public function getRedirectionURI()
    {
        return $this->redirectionURI;
    }

    /**
     * Set the value of redirectionURI
     *
     * @return self $this
     */
    public function setRedirectionURI($redirectionURI) : self
    {
        $this->redirectionURI = $redirectionURI;

        return $this;
    }

    /**
     * Get the value of nameModule 
     * 
     * @return string $nameModule
     */
    public function getNameModule() : string
    {
        return $this->nameModule;
    }

    /**
     * Set the value of nameModule
     *
     * @return self $this
     */
    public function setNameModule($nameModule) : self
    {
        $this->nameModule = $nameModule;

        return $this;
    }

    /**
     * Get the value of rules
     */ 
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Set the value of rules
     *
     * @return  self
     */ 
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * Get the value of config
     */ 
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set the value of config
     *
     * @return  self
     */ 
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }
}
