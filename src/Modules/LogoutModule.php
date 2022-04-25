<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Head;
use CrowAnime\Core\Controllers\Auths\LogoutController;
<<<<<<< HEAD:src/Modules/Logout.php
use CrowAnime\Core\Rule\Rules;
=======
use CrowAnime\Core\Rules\Rules;
>>>>>>> 07416f507a0800470f753ed0b898004de1789fc6:src/Modules/LogoutModule.php
use CrowAnime\Module;

class LogoutModule extends Module
{
    private static ?Module $_logout = null;

    public function __construct()
    {
        parent::__construct(
            "logout",
            new Head(
                "Crow Anime - LogoutModule",[]
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
        if(self::$_logout === null)
            self::$_logout = new LogoutModule();
     
        return self::$_logout;
    }
}