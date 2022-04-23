<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class ProfileMangaList extends Module
{
    
    private static ?Module $profileMangas = null;

    public function __construct() 
    {

        $this->nameModule = 
        "profile/" . User::getCurrentUserURI()->getUsername() . "/mangaslist";
        
        $this->head = new Head(
            User::getCurrentUserURI()->getUsername() . " : Manga List",
            [
                "mangas",
                "profile_mangas"
            ]
        );

        $this->body = new Body(
            "profile_mangas",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::ALL,
        ]);

        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules);
    }

    public static function getModule(): ProfileMangaList|Module|null
    {
        if(self::$profileMangas === null)
            self::$profileMangas = new ProfileMangaList();
            
        return self::$profileMangas;
    }

}