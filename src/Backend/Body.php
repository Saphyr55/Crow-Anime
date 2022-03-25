<?php

namespace CrowAnime\Backend;

use CrowAnime\Frontend\IComponent;

class Body implements IComponent
{
    private $linkComponent;

    public function __construct(string $linkComponent) 
    {
        $this->linkComponent = $linkComponent;
    }

    public function sendHTML(): string|array
    {
        return "";
    }

    /**
     * Get the value of linkComponent
     */ 
    public function getLinkComponent()
    {
        return $this->linkComponent;
    }

    /**
     * Set the value of linkComponent
     *
     * @return  self
     */ 
    public function setLinkComponent($linkComponent)
    {
        $this->linkComponent = $linkComponent;

        return $this;
    }
}