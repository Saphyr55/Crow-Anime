<?php

namespace CrowAnime\Modules\Components;

use CrowAnime\Core\Entities\Path;

/**
 * Class Footer
 * 
 * Permet de contenir le lien du footer
 */
class Footer implements Component
{
    private static ?Footer $footer = null;
    private string $pathFooter;

    /**
     * __construct
     *
     * @param string $nameFileFooter
     */
    public function __construct(string $nameFileFooter) 
    {
        $this->pathFooter = Path::VIEWS . $nameFileFooter . '.php';
    }

    /**
     * Renvoi le code html|php du footer
     *
     * @return string|array
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
     * @param string $pathFooter
     * @return  self
     */
    public function setPathFooter(string $pathFooter) : self
    {
        $this->pathFooter = $pathFooter;

        return $this;
    }

    /**
     * @return Footer
     */
    public static function getFooter(): Footer
    {
        if (self::$footer === null) {
            self::$footer = new Footer('footer');
        }
        return self::$footer;
    }
}