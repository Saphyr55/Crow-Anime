<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\App;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Backend\User;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

class ProfileAnime extends Module
{
    
    private static ?Module $profileAnimes = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() 
    {
        
        $this->nameModule = "profile/" . User::getCurrentUsernameURI() . "/animeslist";
        $this->head = new Head(
            User::getCurrentUsernameURI() . " : Anime List", [
                "src/Frontend/css/animes.css",
            ]
        );
        $this->body = new Body(
            "src/Frontend/components/profile_animes.php",
            Header::getHeader(),
            Footer::getFooter()
        );
        $this->rules = new Rules([
            Rules::ALL,
        ]);
        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules);
    }

    public static function getModule() {
 
        if(self::$profileAnimes === null)
            self::$profileAnimes = new ProfileAnime();  
        return self::$profileAnimes;
    }

}