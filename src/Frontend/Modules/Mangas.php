<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Path;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

class Mangas extends Module
{   
    const TITLE = "Crow Anime - All Mangas";
    const PATH = "mangas";

    private static ?Module $_mangas = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        
        $this->nameModule = Mangas::PATH;
        
        $this->head =  new Head(
            Mangas::TITLE,
            [
                Path::MANGAS_FILE_CSS,
            ]
        );
        
        $this->body = new Body(
            Path::MANGAS_FILE_PHP,
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