<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Auths\LoginController;
use CrowAnime\Core\Rules\Rules;
use CrowAnime\Module;

class LoginModule extends Module
{
    private static ?Module $_login = null;

    public function __construct()
    {
        parent::__construct(
            "login",
            new Head(
                "Crow Anime - LoginModule", [
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

    public static function getModule(): Module|LoginModule|null
    {
        if(self::$_login === null)
            self::$_login = new LoginModule();
     
        return self::$_login;
    }
}