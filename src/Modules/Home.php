<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Home extends Module
{
    const TITLE = "Crow Anime - Home";
    const PATH = "home";

    private static ?Module $_home = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        
        $this->nameModule = Home::PATH;
        
        $this->head = new Head(
            Home::TITLE, [
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

    public static function getModule() {
        if(self::$_home === null){
            self::$_home = new Home();  
        }
        return self::$_home;
    }

}