<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Database\Database;

class ProfileAnimeController extends Controller{
    public function action (): void{
        $anime = Anime::getCurrentAnimeURI();
        $members = Database::getDatabase()->execute("SELECT Count(id_user) 
                                                    FROM lister_anime 
                                                    WHERE id_anime=:id_anime",
                                                                    [":id_anime"=>$anime->getIdWork()])
                                                                    [0]["Count(id_user)"];                                                         
        $this->with([
            "current_anime" => $anime,
            "members" => $members,
        ]);
    }
}

