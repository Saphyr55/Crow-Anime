<?php

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Work\Manga;

class ControllerMangas extends Controller
{
    private $stylePopular;
    private $styleTop;

    public function __construct()
    {
        $this->styles();
        $this->datas = $this->with([
            'mangas' => $this->mangas(),
            'styles' => [
                'popular' => $this->stylePopular,
                'top' => $this->styleTop
            ]
        ]);
    }

    private function mangas()
    {
        switch ($_GET['type']) {
            case 'popular':
                return Manga::getMostPopularMangas();
            case 'recent_upload':
                return Manga::recentUpload();
            default:
                return Manga::getTopMangas();
        }
    }

    private function styles()
    {
        switch ($_GET['type']) {
            case 'popular':
                $this->styleTop = "style='border-color: transpared;'";
                $this->stylePopular = "style='border-color: white;'";
                break;
            case 'top':
                $this->styleTop = "style='border-color: white;'";
                $this->stylePopular = "style='border-color: transpared;'";
                break;
            case 'recent_upload':
                $this->styleTop = "style='border-color: transpared;'";
                $this->stylePopular = "style='border-color: transpared;'";
                break;
            default:
                $this->styleTop = "style='border-color: white;'";
                $this->stylePopular = "style='border-color: transpared;'";
                break;
        }
    }
}
