<?php

namespace CrowAnime\Modules\Components;

use CrowAnime\Core\Path;

/**
 * Class Header
 * 
 * Permet de contenir le lien du header
 */
class Header
{

    private static $header;
    private $pathHeader;

    /**
     * __construct
     *
     * @param  mixed $pathHeader
     * @return void
     */
    public function __construct(string $nameFileHeader)
    {
        $this->pathHeader = Path::VIEWS . $nameFileHeader . '.php';
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

    /**
     * Get the value of header
     */
    public static function getHeader()
    {
        if (self::$header === null) {
            self::$header = new Header('header');
        }
        return self::$header;
    }

    /**
     * Set the value of header
     *
     * @return  self
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }
}
