<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Head;
use CrowAnime\Core\Controllers\Auths\SignupController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /signup
 */
class SignupModule extends Module
{
    protected static ?Module $_signup = null;

    public function __construct()
    {
        $nameModule = 'signup';
        $head = new Head('Crow Anime - Sign Up', [$nameModule]);
        $body = new Body($nameModule); // ne contient pas de header et footer
        $rules = new Rules([
            Rules::NOT_LOGIN_REQUIRED
        ]);
        $controller = new SignupController();

        parent::__construct($nameModule, $head, $body, $rules, $controller);
    }

    public static function getModule(): ?SignupModule
    {
        if (self::$_signup === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'signup'))
            self::$_signup = new SignupModule();

        return self::$_signup;
    }
}
