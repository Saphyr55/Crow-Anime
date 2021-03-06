<?php /** @noinspection ALL */

namespace CrowAnime\Components;

use CrowAnime\Core\Entities\Path;
use CrowAnime\Core\Language\Language;

/**
 * Permet de generer le code head html avec un titre et plusieurs lien css
 */
class Head implements Component
{
    private string $title;
    private array $linksCSS;
    private array $htmlHead;
    private $lang;
    private $headPath;

    public function __construct(string $title, array $namesFilesCSS = [])
    {
        $this->title = $title;
        $this->lang = Language::getLanguage()->getCurrentLanguage();
        $this->linksCSS = [];
        if (isset($namesFilesCSS)) {
            foreach ($namesFilesCSS as $value) {
                $this->linksCSS[] = Path::CSS . $value . '.css';
            }
        }
        $this->htmlHead = $this->head();
    }

    public function getContentHead(): string|array
    {
        return $this->htmlHead;
    }

    /**
     * recuper le code html ( head ) sous forme array
     *
     * @return array
     */
    private function head(): array
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
            "<link rel='stylesheet' href='/" . Path::CSS . "header.css'>\n",
            "<link rel='stylesheet' href='/" . Path::CSS . "footer.css'>\n",
        ];

        $htmlHeadAfterLinksCSS  = [
            "<link rel='icon' type='image/png' sizes='16x16' href='https://cdn-icons-png.flaticon.com/512/3504/3504720.png'>\n",
            "<script src='https://kit.fontawesome.com/909d9d481e.js' crossorigin='anonymous'></script>\n",
            "<title>$this->title</title>\n",
            "</head>\n"
        ];

        if ($this->linksCSS !== []) {
            foreach ($this->linksCSS as $linkCSS)
                $htmlHeadLinksCSS[] = "<link rel='stylesheet' href='/$linkCSS'>\n";
        }

        return array_merge($htmlHeadBeforeLinksCSS, $htmlHeadLinksCSS, $htmlHeadAfterLinksCSS);
    }

    /**
     * Get the value of linksCSS
     */
    public function getLinksCSS(): array
    {
        return $this->linksCSS;
    }

    /**
     * Set the value of linksCSS
     *
     * @return  self
     */
    public function setLinksCSS($linksCSS): static
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
