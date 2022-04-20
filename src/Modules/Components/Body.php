<?php

namespace CrowAnime\Modules\Components;

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
    const _BODY_PATH_ = Path::VIEWS . 'body.php';

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
     * Set the value of pathComponent
     **
     * @param string $pathComponent
     * @return self
     */
    public function setPathComponent(string $pathComponent): static
    {
        $this->pathComponent = $pathComponent;

        return $this;
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
     * Set the value of footer
     *
     * @param footer
     * 
     * @return  self
     */
    public function setFooter($footer): static
    {
        $this->footer = $footer;

        return $this;
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

    /**
     * Set the value of header
     *
     * @param header
     * 
     * @return self
     */
    public function setHeader($header): static
    {
        $this->header = $header;

        return $this;
    }
}
