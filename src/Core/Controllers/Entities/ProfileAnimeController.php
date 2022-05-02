<?php

namespace CrowAnime\Core\Controllers\Entities;

class ProfileAnimeController extends Controller{
    public function action (): void{
        $this->with([
            "current_anime" => Anime::getCurrentAnimeURI(),
        ]);
    }
}