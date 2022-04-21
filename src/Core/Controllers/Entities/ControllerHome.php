<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Season;

class ControllerHome extends Controller
{
    public function action() : void
    {
        $this->with([
            'anime_season' => ucfirst(strtolower(Season::getCurrentSeason())) . ' ',
            'actual_date' => date('Y') . ' ',
            'animes' => Anime::getAnimesOfCurrentSeason(),
        ]);
    }
}
