<?php

namespace CrowAnime\Frontend;

class Header
{
    private $pathHeader;

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
