<?php

namespace CrowAnime\Modules\Components;

use CrowAnime\Core\IComponent;
use CrowAnime\Core\Path;

/**
 * Class Footer
 * 
 * Permet de contenir le lien du footer
 */
class Footer implements IComponent
{
    private static $footer;
    private $pathFooter;
        
    /**
     * __construct
     *
     * @param  string $pathFooter
     */
    public function __construct(string $nameFileFooter) 
    {
        $this->pathFooter = Path::VIEWS . $nameFileFooter . '.php';
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

    /**
     * Set the value of footer
     *
     * @return  self
     */ 
    public function setFooter($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Get the value of footer
     */ 
    public static function getFooter()
    {
        if (self::$footer === null) {
            self::$footer = new Footer('footer');
        }
        return self::$footer;
    }
}