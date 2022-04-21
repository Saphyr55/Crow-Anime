<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\AuthControllers\ControllerSignup;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Module;

class Signup extends Module
{
    protected static ?Module $_signup = null;

    public function __construct()
    {
        $nameModule = 'signup';
        $head = new Head('Crow Anime - Sign Up', [$nameModule]);
        $body = new Body($nameModule);
        $rules = new Rules([
            Rules::NOT_LOGIN_REQUIRED
        ]);
        $controller = new ControllerSignup();
        parent::__construct($nameModule, $head, $body, $rules, $controller);
    }

    public static function getModule(): ?Signup
    {
        if (self::$_signup === null)
            self::$_signup = new Signup();

        return self::$_signup;
    }
}
