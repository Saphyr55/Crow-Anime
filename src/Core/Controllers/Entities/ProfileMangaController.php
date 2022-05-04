<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Database\Database;

class ProfileMangaController extends Controller{
    public function action (): void{
        $manga = Manga::getCurrentMangaURI();
        $members = Database::getDatabase()->execute("SELECT Count(id_user) 
                                                    FROM lister_manga 
                                                    WHERE id_manga=:id_manga",
                                                                    [":id_manga"=>$manga->getIdWork()])
                                                                    [0]["Count(id_user)"];                                                         
        $this->with([
            "current_manga" => $manga,
            "members" => $members,
        ]);
    }
}

