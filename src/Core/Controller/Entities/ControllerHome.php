<?php

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Season;

class ControllerHome extends Controller
{

    public function __construct()
    {
        $this->with([
            'anime_season' => ucfirst(strtolower(Season::getCurrentSeason())) . ' ',
            'actual_date' => date('Y') . ' ',
            'animes' => Anime::getAnimesOfCurrentSeason(),
        ]);
    }

    public function action() : void
    {
        // TODO: Implement action() method.
    }
}
