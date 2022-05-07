<?php

namespace CrowAnime\Modules\Admin;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Admin\AddCharacterController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

class AddCharacterModule extends Module
{

    private static ?Module $_add_character = null;

    public function __construct()
    {
        parent::__construct(
            "admin/" . User::getCurrentUserURI()->getUsername() . "/add-character",
            new Head("Admin - Add Character", ['add_character']),
            new Body("add_character", Header::getHeader(), Footer::getFooter()),
            new Rules([Rules::ADMIN_ONLY]),
            new AddCharacterController()
        );
    }

    public static function getModule(): ?AddCharacterModule
    {
        if (self::$_add_character === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'admin'))
            self::$_add_character = new AddCharacterModule();

        return self::$_add_character;
    }
}