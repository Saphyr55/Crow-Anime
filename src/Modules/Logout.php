<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Auths\LogoutController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;

class Logout extends Module 
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

    public static function getModule(): Logout|Module|null
    {
        if(self::$_logout === null)
            self::$_logout = new Logout();  
     
        return self::$_logout;
    }
}