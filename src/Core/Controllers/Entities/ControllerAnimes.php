<?php

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Entities\Anime;

class ControllerAnimes extends Controller
{
    private string $stylePopular;
    private string $styleTop;
    private string $styleSeasonal;

    public function __construct()
    {
        $this->styles();
        $this->with([
            'animes' => $this->mangas(),
            'styles' => [
                'popular' => $this->stylePopular,
                'top' => $this->styleTop,
                'seasonal' => $this->styleSeasonal
            ]
        ]);
    }

    private function mangas(): array
    {
        return match ($_GET['type']) {
            'popular' => Anime::getMostPopularAnimes(),
            'seasonal' => Anime::getAnimesOfCurrentSeason(),
            'recent_upload' => Anime::recentAnimesUpload(),
            default => Anime::getTopAnimes()
        };
    }

    private function styles()
    {
        switch ($_GET['type']) {
            case 'popular':
                $this->styleTop = "style='border-color: transpared;'";
                $this->stylePopular = "style='border-color: white;'";
                $this->styleSeasonal = "style='border-color: transpared;'";
                break;
            case 'recent_upload':
                $this->styleTop = "style='border-color: transpared;'";
                $this->stylePopular = "style='border-color: transpared;'";
                $this->styleSeasonal = "style='border-color: transpared;'";
                break;
            case 'seasonal' :
                $this->stylePopular =  "style='border-color: transpared;'";
                $this->styleTop = "style='border-color: transpared;'";
                $this->styleSeasonal = "style='border-color: white;'";
                break;
            default:
                $this->styleTop = "style='border-color: white;'";
                $this->stylePopular = "style='border-color: transpared;'";
                $this->styleSeasonal = "style='border-color: transpared;'";
                break;
        }
    }

    public function action() : void
    {
        // TODO: Implement action() method.
    }
}