<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Auths\LoginController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /login
 */
class LoginModule extends Module
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

    public static function getModule(): Module|LoginModule|null
    {
        if(self::$_login === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'login'))
            self::$_login = new LoginModule();
     
        return self::$_login;
    }
}