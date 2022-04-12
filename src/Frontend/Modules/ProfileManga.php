<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Backend\User;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

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
                "src/Frontend/css/profile_mangas.css",
            ]
        );

        $this->body = new Body(
            "src/Frontend/components/profile_mangas.php",
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