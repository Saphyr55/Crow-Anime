<?php

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Entities\Anime;
use CrowAnime\Entities\Season;

class ControllerHome extends Controller
{
    private array $datas;

    public function __construct()
    {
        $this->datas = $this->with([
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
