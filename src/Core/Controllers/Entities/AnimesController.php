<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Season;
use CrowAnime\Core\Language\Language;

class AnimesController extends Controller
{
    private string $stylePopular = '';
    private string $styleTop = '';
    private string $styleSeasonal = '';


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
        switch ($_GET['type'])
        {
            case 'popular':
                $this->stylePopular = "style='border-color: #5271FF;'";
                break;
            case 'seasonal' :
                $this->styleSeasonal = "style='border-color: #5271FF;'";
                break;
            default:
                $this->styleTop = "style='border-color:  #5271FF;'";
                break;
        }
    }

    public function action(): void
    {
        $this->language(Language::getLanguage()->for('animes'));
        $this->styles();
        $this->with([
            'animes' => $this->mangas(),
            'styles' => [
                'popular' => $this->stylePopular,
                'top' => $this->styleTop,
                'seasonal' => $this->styleSeasonal
            ],
            'current_season' => ucfirst(strtolower(Season::getCurrentSeason())) . ' ',
            'current_year' => date('Y')
        ]);
    }
}