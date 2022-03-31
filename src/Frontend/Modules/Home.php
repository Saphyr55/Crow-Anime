<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

class Home extends Module
{
    private static ?Module $_home = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        $this->nameModule = "home";
        $this->head = new Head(
            "CrowAnime - Home", [
                "src/Frontend/css/home.css",
            ]
        );
        $this->body = new Body(
            "src/Frontend/components/home.php",
            Header::getHeader(),
            Footer::getFooter()
        );
        $this->rules = new Rules([
            Rules::ALL,
        ]);
        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules);
    }

    public static function getModule() {
        if(self::$_home === null){
            self::$_home = new Home();  
        }
        return self::$_home;
    }

}