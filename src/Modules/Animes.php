<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Animes extends Module
{
    private static ?Module $_animes = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        
        $this->nameModule = "animes";
        
        $this->head = new Head(
            "Crow Anime - All Animes", [
                "animes",
            ]
        );
        
        $this->body = new Body(
            "animes",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::ALL,
        ]);

        parent::__construct(
            $this->nameModule, 
            $this->head, 
            $this->body, 
            $this->rules
        );
    }

    public static function getModule()
    {
        if(self::$_animes === null)
            self::$_animes = new Animes();  
     
        return self::$_animes;
    }

}