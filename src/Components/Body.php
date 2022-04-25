<?php

namespace CrowAnime\Components;

use CrowAnime\Core\Entities\Path;

/**
 * Class Body
 * 
 * Permet de contenir le chemin du composents qui va servir de body,
 * un header, et un footer
 */
class Body implements Component
{
    private string $pathComponent;
    private ?Header $header;
    private ?Footer $footer;

    /**
     * Constructeur du Body
     *
     * @param string $pathComponent
     * @param Header|null $header
     * @param Footer|null $footer
     */
    public function __construct(string $pathComponent, ?Header $header = null, ?Footer $footer = null)
    {
        $this->pathComponent = Path::VIEWS . $pathComponent . '.php';
        $this->header = $header;
        $this->footer = $footer;
    }

    /**
     * Get the value of pathComponent
     * 
     * @return string
     */
    public function getPathComponent(): string
    {
        return $this->pathComponent;
    }

    /**
     * Get the value of footer
     *
     * @return Footer|null
     */
    public function getFooter() : ?Footer
    {
        return $this->footer;
    }

    /**
     * Get the value of header
     *
     * @return header|null
     */
    public function getHeader(): ?header
    {
        return $this->header;
    }

}
