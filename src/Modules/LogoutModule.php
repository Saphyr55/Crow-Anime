<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Head;
use CrowAnime\Core\Controllers\Auths\LogoutController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /logout
 */
class LogoutModule extends Module
{
    private static ?Module $_logout = null;

    public function __construct()
    {
        parent::__construct(
            "logout",
            new Head(
                "Crow Anime - Logout",[]
            ),
            new Body(
            "logout", null, null
            ),
            new Rules([
                Rules::LOGIN_REQUIRED,
            ]),
            new LogoutController()
        );
    }

    public static function getModule(): LogoutModule|Module|null
    {
        if(self::$_logout === null&& !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'logout'))
            self::$_logout = new LogoutModule();
     
        return self::$_logout;
    }
}