<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Core\Module;

class Signup extends Module
{
    private static ?Module $_signup = null;

    public function __construct()
    {

        $this->nameModule = "signup";

        $this->head = new Head(
            "Crow Anime - Sign Up",
            [
                "signup",
            ]
        );

        $this->body = new Body(
            "signup",
        );

        $this->rules = new Rules([
            Rules::NOT_LOGIN_REQUIRED,
        ]);

        parent::__construct($this->nameModule, $this->head, $this->body, $this->rules);
    }

    public static function getModule()
    {
        if (self::$_signup === null)
            self::$_signup = new Signup();

        return self::$_signup;
    }
}
