<?php

namespace CrowAnime;

use CrowAnime\Backend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Frontend\IComponent;

class Module implements IComponent 
{
    private $head;
    private $body;
    private $redirectionURI;
    private $nameModule;

    public function __construct(string $nameModule, Head $head, Body $body) 
    {
        $this->nameModule = $nameModule;
        $this->redirectionURI = "http://$_SERVER[HTTP_HOST]/$nameModule";
        $this->head  = $head;
        $this->body  = $body;
    }

    public function sendHTML(): string|array
    {
        return [
            "head" => $this->head->sendHTML(),
            "body" => $this->body->sendHTML()
        ];
    }
 
    /**
     * Get the value of head
     */ 
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Set the value of head
     *
     * @return  self
     */ 
    public function setHead($head)
    {
        $this->head = $head;

        return $this;
    }

    /**
     * Get the value of body
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @return  self
     */ 
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the value of redirectionURI
     */ 
    public function getRedirectionURI()
    {
        return $this->redirectionURI;
    }

    /**
     * Set the value of redirectionURI
     *
     * @return  self
     */ 
    public function setRedirectionURI($redirectionURI)
    {
        $this->redirectionURI = $redirectionURI;

        return $this;
    }

    /**
     * Get the value of nameModule
     */ 
    public function getNameModule()
    {
        return $this->nameModule;
    }

    /**
     * Set the value of nameModule
     *
     * @return  self
     */ 
    public function setNameModule($nameModule)
    {
        $this->nameModule = $nameModule;

        return $this;
    }
}