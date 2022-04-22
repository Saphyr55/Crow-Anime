<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Auths\LoginController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Login extends Module
{
    private static ?Module $_login = null;

    public function __construct()
    {
        parent::__construct(
            "login",
            new Head(
                "Crow Anime - Login", [
                    "login",
                ]
            ),
            new Body(
                "login",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([
                Rules::NOT_LOGIN_REQUIRED,
            ]),
            new LoginController());
    }

    public static function getModule(): Module|Login|null
    {
        if(self::$_login === null)
            self::$_login = new Login();  
     
        return self::$_login;
    }
}