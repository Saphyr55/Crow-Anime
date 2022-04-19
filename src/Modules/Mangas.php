<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Module;
use CrowAnime\Core\Path;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

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
                $this->nameModule,
            ]
        );
        
        $this->body = new Body(
            $this->nameModule,
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