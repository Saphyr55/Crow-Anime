<?php

namespace CrowAnime\Frontend;

class Footer 
{

    private $pathFooter;

    public function __construct(string $pathFooter) 
    {
        $this->pathFooter = $pathFooter;
    }

    /**
     * Get the value of pathFooter
     */ 
    public function getPathFooter()
    {
        return $this->pathFooter;
    }

    /**
     * Set the value of pathFooter
     *
     * @return  self
     */ 
    public function setPathFooter($pathFooter)
    {
        $this->pathFooter = $pathFooter;

        return $this;
    }
}