<?php

namespace CrowAnime\Modules;

use CrowAnime\App;
use CrowAnime\Core\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Core\User;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class AddManga extends Module
{
    private static ?Module $_add_manga = null;

    public function __construct()
    {
        App::checkProfileURI();

        $this->nameModule =
            "admin/" . User::getCurrentUsernameURI() . "/add-manga";

        $this->head = new Head(
            "Admin - Add Manga",
            [
                "add_anime",
            ]
        );

        $this->body = new Body(
            "add_manga",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::LOGIN_REQUIRED,
            Rules::ADMIN_ONLY
        ]);

        parent::__construct(
            $this->nameModule,
            $this->head,
            $this->body,
            $this->rules
        );
    }

    public static function getModule()
    {
        if (self::$_add_manga === null)
            self::$_add_manga = new Addmanga();

        return self::$_add_manga;
    }
}
