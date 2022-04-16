<?php

namespace CrowAnime\Frontend\Modules;

use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

class Signup extends Module
{
    private static ?Module $_signup = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct()
    {

        $this->nameModule = "signup";

        $this->head = new Head(
            "Crow Anime - Sign Up",
            [
                "src/Frontend/css/signup.css",
            ]
        );

        $this->body = new Body(
            "src/Frontend/components/signup.php",
        );

        $this->rules = new Rules([
            Rules::TO_BE_NOT_LOGIN,
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
