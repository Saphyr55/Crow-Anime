<?php

namespace CrowAnime\Backend;

use CrowAnime\Frontend\IComponent;

class Head implements IComponent
{
    private $title;
    private $linksCSS;
    private $htmlHead;
    private $lang;

    public function __construct(string $title, ?string $linksCSS)
    {
        $this->title = $title;
        if (!isset($linksCSS) && $linksCSS === null)
            $this->linksCSS = "";
        else
            $this->linksCSS = $linksCSS;
        $this->htmlHead = $this->htmlCreateHead();
    }

    public function sendHTML(): string|array
    {
        return $this->htmlHead;
    }

    private function htmlCreateHead(): array
    {
        $htmlHead = [
            "<!DOCTYPE html>",
            "<html lang='$this->lang'>",
            "<head>",
            "<meta charset='UTF-8'>",
            "<meta http-equiv='refresh'>",
            "<meta name='viewport' content='width=device-width, initial-scale=1.0'>",
            "<link rel='stylesheet' href='http://$_SERVER[HTTP_HOST]/src/Frontend/css/header.css'>",
            "<link rel='stylesheet' href='http://$_SERVER[HTTP_HOST]/src/Frontend/css/footer.css'>",
            "<link rel='stylesheet' href='http://$_SERVER[HTTP_HOST]/$this->linksCSS'>",
            "<script src='https://kit.fontawesome.com/909d9d481e.js' crossorigin='anonymous'></script>",
            "<title>$this->title</title>",
            "</head>"
        ];
        return $htmlHead;
    }

    /**
     * Get the value of linksCSS
     */
    public function getLinksCSS()
    {
        return $this->linksCSS;
    }

    /**
     * Set the value of linksCSS
     *
     * @return  self
     */
    public function setLinksCSS($linksCSS)
    {
        $this->linksCSS = $linksCSS;

        return $this;
    }
}
