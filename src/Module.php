<?php

namespace CrowAnime;

use CrowAnime\Frontend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Frontend\Header;
use CrowAnime\Frontend\IComponent;

/**
 * Class Module
 * 
 * Permet de contenir le contenu d'une page html
 */
class Module implements IComponent
{
    private $head;
    private $body;
    private $redirectionURI;
    private $nameModule;

    
    /**
     * __construct
     *
     * @param  mixed $nameModule
     * @param  mixed $head
     * @param  mixed $body
     * @return void
     */
    public function __construct(string $nameModule, Head $head, Body $body)
    {
        $this->nameModule = $nameModule;
        $this->redirectionURI = "http://$_SERVER[HTTP_HOST]/$nameModule";
        $this->head  = $head;
        $this->body  = $body;
    }
    
    /**
     * sendHTML
     * 
     * Renvoi le body et le head dans un tableau
     *
     * @return string|array
     */
    public function sendHTML(): string|array
    {
        return [
            "head" => $this->head->sendHTML(),
            "body" => $this->body->sendHTML()
        ];
    }

    /**
     * Get the value of head
     *
     * @return Header $head
     */
    public function getHead() : Header
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
}
