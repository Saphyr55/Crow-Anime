<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class ProfileAnimeList extends Module
{
    
    private static ?Module $profileAnimes = null;

    public function __construct() 
    {
        
        $this->nameModule = "profile/" . User::getCurrentUsernameURI() . "/animeslist";
        $this->head = new Head(
            User::getCurrentUsernameURI() . " : Anime List", [
                "animes",
                "profile_animes"
            ]
        );
        $this->body = new Body(
            "profile_animes",
            Header::getHeader(),
            Footer::getFooter()
        );
        $this->rules = new Rules([
            Rules::ALL,
        ]);
        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules);
    }

    public static function getModule(): ProfileAnimeList|Module|null
    {
 
        if(self::$profileAnimes === null)
            self::$profileAnimes = new ProfileAnimeList();
        return self::$profileAnimes;
    }

}