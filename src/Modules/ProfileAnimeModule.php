<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Core\Entities\Anime;

class ProfileAnimeModule extends Module{

    private static ?Module $profileAnime = null;

    public function __construct(){

        $anime = Anime::getCurrentAnimeURI();

        parent::__construct(
            "anime/id/anime",
            //"anime/".$anime->getIdWork."/".str_replace(" ", "_", $anime->getTitle_en),
            new Head("Crow Anime - Anime Name",
                ["profile_anime"]),
                new Body("profile_anime",
                    Header::getHeader(),
                    Footer::getFooter()
                ),
                new Rules([Rules::ALL])  
            );

    }

    public static function getModule(): ProfileAnimeModule|Module|null
    {
        if(self::$profileAnime === null)
            self::$profileAnime = new ProfileAnimeModule();
     
        return self::$profileAnime;
    }
}