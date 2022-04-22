<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Season;
use CrowAnime\Core\Language\Language;

class HomeController extends Controller
{

    public function action(): void
    {
        $this->language(Language::getStrings()->for('home'));
        $this->with([
            'anime_season' => ucfirst(strtolower(Season::getCurrentSeason())) . ' ',
            'actual_date' => date('Y') . ' ',
            'animes' => Anime::getAnimesOfCurrentSeason(),
        ]);
    }
}
