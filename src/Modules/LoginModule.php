<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Auths\LoginController;
<<<<<<< HEAD:src/Modules/Login.php
use CrowAnime\Core\Rule\Rules;
=======
use CrowAnime\Core\Rules\Rules;
>>>>>>> 07416f507a0800470f753ed0b898004de1789fc6:src/Modules/LoginModule.php
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