<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Frontend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

class Login extends Module
{
    private static ?Module $_login = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        
        $this->nameModule = "login";
        
        $this->head = new Head(
            "Crow Anime - Login", [
                "src/Frontend/css/login.css",
            ]
        );
        
        $this->body = new Body(
            "src/Frontend/components/login.php",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::TO_BE_NOT_LOGIN,
        ]);

        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules);
    }

    public static function getModule()
    {
        if(self::$_login === null)
            self::$_login = new Login();  
     
        return self::$_login;
    }
}