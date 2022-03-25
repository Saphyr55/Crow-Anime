<?php

namespace CrowAnime;

use CrowAnime\Backend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Frontend\IComponent;

class Module implements IComponent 
{
    private $head;
    private $body;

    public function __construct(Head $head, Body $body) 
    {
        $this->head  = $head;
        $this->body  = $body;
    }

    public function sendHTML(): string|array
    {
        return [
            $this->head->sendHTML(),
            $this->body->sendHTML()
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
}