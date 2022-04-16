<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Path;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

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
                Path::HOME_FILE_CSS,
            ]
        );
        
        $this->body = new Body(
            Path::HOME_FILE_PHP,
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