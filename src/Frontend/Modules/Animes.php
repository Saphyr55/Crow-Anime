<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

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
            "CrowAnime - Home", [
                "src/Frontend/css/animes.css",
            ]
        );
        
        $this->body = new Body(
            "src/Frontend/components/animes.php",
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