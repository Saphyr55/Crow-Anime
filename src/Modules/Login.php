<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

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
                "login",
            ]
        );
        
        $this->body = new Body(
            "login",
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