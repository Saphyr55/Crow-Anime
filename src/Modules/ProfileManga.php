<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Path;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Core\User;
use CrowAnime\Core\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class ProfileManga extends Module
{
    
    private static ?Module $profileMangas = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() 
    {

        $this->nameModule = 
        "profile/" . User::getCurrentUsernameURI() . "/mangaslist";
        
        $this->head = new Head(
            User::getCurrentUsernameURI() . " : Manga List",
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

    public static function getModule() {
 
        if(self::$profileMangas === null)
            self::$profileMangas = new ProfileManga();  
            
        return self::$profileMangas;
    }

}