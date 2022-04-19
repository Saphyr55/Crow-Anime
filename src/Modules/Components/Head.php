<?php

namespace CrowAnime\Modules\Components;

use CrowAnime\Core\IComponent;
use CrowAnime\Core\Path;

class Head implements IComponent
{
    private $title;
    private $linksCSS;
    private $htmlHead;
    private $lang;
    const _HEAD_PATH_ = Path::VIEWS . "head.php";

    public function __construct(string $title, array $namesFilesCSS = [])
    {
        $this->title = $title;
        $this->linksCSS = [];
        if (isset($namesFilesCSS)) {
            foreach ($namesFilesCSS as $value) {
                array_push($this->linksCSS, Path::CSS . $value . '.css');
            }
        }
        $this->htmlHead = $this->htmlCreateHead();
    }

    public function sendHTML(): string|array
    {
        return $this->htmlHead;
    }

    private function htmlCreateHead(): array
    {
        $htmlHeadBeforeLinksCSS = [
            "<!DOCTYPE html>\n",
            "<html lang='$this->lang'>\n",
            "<head>\n",
            "<meta charset='UTF-8'>\n",
            "<meta http-equiv='refresh'>\n",
            "<meta name='viewport' content='width=device-width, initial-scale=1.0'>\n",
        ];

        $htmlHeadLinksCSS = [
            "<link rel='stylesheet' href='http://$_SERVER[HTTP_HOST]/" . Path::CSS . "header.css'>\n",
            "<link rel='stylesheet' href='http://$_SERVER[HTTP_HOST]/" . Path::CSS . "footer.css'>\n",
        ];

        $htmlHeadAfterLinksCSS  = [
            "<link rel='icon' type='image/png' sizes='16x16' href='https://cdn-icons-png.flaticon.com/512/3504/3504720.png'>\n",
            "<script src='https://kit.fontawesome.com/909d9d481e.js' crossorigin='anonymous'></script>\n",
            "<title>$this->title</title>\n",
            "</head>\n"
        ];

        if ($this->linksCSS !== []) {
            foreach ($this->linksCSS as $linkCSS)
                array_push($htmlHeadLinksCSS, "<link rel='stylesheet' href='http://$_SERVER[HTTP_HOST]/$linkCSS'>\n");
        }
        $htmlHead = array_merge($htmlHeadBeforeLinksCSS, $htmlHeadLinksCSS, $htmlHeadAfterLinksCSS);

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

    /**
     * Get the value of headPath
     */
    public function getHeadPath()
    {
        return $this->headPath;
    }
}