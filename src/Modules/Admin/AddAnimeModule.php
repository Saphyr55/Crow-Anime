<?php

namespace CrowAnime\Modules\Admin;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Entities\AddAnimeController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

class AddAnimeModule extends Module
{
    private static ?Module $_add_anime = null;

    public function __construct()
    {
        parent::__construct(
            "admin/" . User::getCurrentUserURI()->getUsername() . "/add-anime",
            new Head("Admin - Add anime", ["add_anime"]),
            new Body(
                "add_anime",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([
                Rules::LOGIN_REQUIRED,
                Rules::ADMIN_ONLY,
                Rules::USER_CURRENT_ONLY
            ]),
            new AddAnimeController()
        );
    }

    public static function getModule(): Module|AddAnimeModule|null
    {
        if (self::$_add_anime === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'admin'))
            self::$_add_anime = new AddAnimeModule();

        return self::$_add_anime;
    }
}
