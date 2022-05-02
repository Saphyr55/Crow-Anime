<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;

class ProfileAnimeController extends Controller{
    public function action (): void{
        $this->with([
            "current_anime" => Anime::getCurrentAnimeURI(),
        ]);
    }
}