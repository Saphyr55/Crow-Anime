<?php

namespace CrowAnime\Frontend;


/**
 * Class Header
 * 
 * Permet de contenir le lien du header
 */
class Header
{
    private $pathHeader;
        
    /**
     * __construct
     *
     * @param  mixed $pathHeader
     * @return void
     */
    public function __construct(string $pathHeader)
    {
        $this->pathHeader = $pathHeader;
    }

    /**
     * Get the value of pathHeader
     */ 
    public function getPathHeader()
    {
        return $this->pathHeader;
    }

    /**
     * Set the value of pathHeader
     *
     * @return  self
     */ 
    public function setPathHeader($pathHeader)
    {
        $this->pathHeader = $pathHeader;

        return $this;
    }
}
