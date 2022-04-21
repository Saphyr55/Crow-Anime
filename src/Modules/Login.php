<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\AuthControllers\ControllerLogin;
use CrowAnime\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Login extends Module
{
    private static ?Module $_login = null;

    public function __construct() {
        
        $this->nameModule = "login";
        
        $this->head = new Head(
            "Crow Anime - Login", [
                "login",
            ]
        );
        
        $this->body = new Body(
            "login",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::NOT_LOGIN_REQUIRED,
        ]);

        $this->controller = new ControllerLogin();

        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules, $this->controller);
    }

    public static function getModule(): Module|Login|null
    {
        if(self::$_login === null)
            self::$_login = new Login();  
     
        return self::$_login;
    }
}