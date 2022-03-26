<?php

namespace CrowAnime\Frontend;

use CrowAnime\Frontend\IComponent;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;

/**
 * Class Body
 * 
 * Permet de contenir le chemin du composents qui va servir de body,
 * un header, et un footer
 */
class Body implements IComponent
{
    private $pathComponent;
    private $header;
    private $footer;

    /**
     * Constructeur du Body
     * 
     * @param pathComponent
     * @param header
     * @param footer
     */
    public function __construct(string $pathComponent, ?Header $header, ?Footer $footer)
    {
        $this->pathComponent = $pathComponent;
        $this->header = $header;
        $this->footer = $footer;
    }

    /**
     * Renvoi le contenus html de la classe sous form de tableau
     * 
     * @return string|array
     */
    public function sendHTML(): string|array
    {
        return [
            "<body>",
            file_get_contents("$_SERVER[DOCUMENT_ROOT]/" . $this->header->getPathHeader()),
            file_get_contents("$_SERVER[DOCUMENT_ROOT]/$this->pathComponent"),
            file_get_contents("$_SERVER[DOCUMENT_ROOT]/" . $this->footer->getPathFooter()),
            "</body>",
            "</html>"
        ];
    }

    /**
     * Get the value of pathComponent
     * 
     * @return pathComponent
     */
    public function getPathComponent()
    {
        return $this->pathComponent;
    }

    /**
     * Set the value of pathComponent
     *
     * @param pathComponent
     * 
     * @return self
     */
    public function setPathComponent($pathComponent)
    {
        $this->pathComponent = $pathComponent;

        return $this;
    }

    /**
     * Get the value of footer
     * 
     * @return fotter
     */
    public function getFooter()
    {
        return $this->footer;
    }

    /**
     * Set the value of footer
     *
     * @param footer
     * 
     * @return  self
     */
    public function setFooter($footer)
    {
        $this->footer = $footer;

        return $this;
    }

    /**
     * Get the value of header
     * 
     * @return header
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set the value of header
     *
     * @param header
     * 
     * @return self
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }
}
