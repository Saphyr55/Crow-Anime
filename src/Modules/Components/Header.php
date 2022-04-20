<?php

namespace CrowAnime\Modules\Components;

use CrowAnime\Core\Entities\Path;

/**
 * Class Header
 * 
 * Permet de contenir le lien du header
 */
class Header implements Component
{

    private static ?Header $header = null;
    private string $pathHeader;

    /**
     * __construct
     *
     * @param string $nameFileHeader
     */
    public function __construct(string $nameFileHeader)
    {
        $this->pathHeader = Path::VIEWS . $nameFileHeader . '.php';
    }

    /**
     * Get the value of pathHeader
     */
    public function getPathHeader(): string
    {
        return $this->pathHeader;
    }

    /**
     * Set the value of pathHeader
     *
     * @param $pathHeader
     * @return  self
     */
    public function setPathHeader($pathHeader): self
    {
        $this->pathHeader = $pathHeader;

        return $this;
    }

    /**
     * Get the value of header
     */
    public static function getHeader(): Header
    {
        if (self::$header === null) {
            self::$header = new Header('header');
        }
        return self::$header;
    }

}
