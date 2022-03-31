<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Frontend\IModule;
use CrowAnime\Module;

class Mangas extends Module
{   
    private static ?Module $_mangas = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        
        $this->nameModule = "mangas";
        
        $this->head =  new Head(
            "CrowAnime - All Mangas",
            [
                "src/Frontend/css/mangas.css",
            ]
        );
        
        $this->body = new Body(
            "src/Frontend/components/mangas.php",
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
        if(self::$_mangas === null)
            self::$_mangas = new Mangas();  
     
        return self::$_mangas;
    }
}