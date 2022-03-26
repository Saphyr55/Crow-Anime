<?php

namespace CrowAnime\Frontend;

/**
 * Class Footer
 * 
 * Permet de contenir le lien du footer
 */
class Footer implements IComponent
{
    
    private $pathFooter;
        
    /**
     * __construct
     *
     * @param  string $pathFooter
     */
    public function __construct(string $pathFooter) 
    {
        $this->pathFooter = $pathFooter;
    }
    
    /**
     * Renvoi le code html|php du footer
     *
     * @return string
     */
    public function sendHTML(): string|array
    {
        return file_get_contents('/'.$this->pathFooter);
    }

    /**
     * Get the value of pathFooter
     */ 
    public function getPathFooter() : string
    {
        return $this->pathFooter;
    }

    /**
     * Set the value of pathFooter
     *
     * @return  self
     */ 
    public function setPathFooter(string $pathFooter) : self
    {
        $this->pathFooter = $pathFooter;

        return $this;
    }
}