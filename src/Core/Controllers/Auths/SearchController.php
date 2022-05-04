<?php

namespace CrowAnime\Core\Controllers\Auths;

use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Manga;

class SearchController extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $this->with([
            'animes' => Anime::getMostPopularAnimes(),
            'mangas' => Manga::getTopMangas()
        ]);
    }
}