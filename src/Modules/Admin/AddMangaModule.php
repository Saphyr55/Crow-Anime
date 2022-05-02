<?php

namespace CrowAnime\Modules\Admin;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Entities\AddMangaController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

class AddMangaModule extends Module
{
    private static ?Module $_add_manga = null;

    public function __construct()
    {
        parent::__construct(
            "admin/" . User::getCurrentUserURI()->getUsername() . "/add-manga",
            new Head(
                "Admin - Add Manga",
                [
                    "add_anime",
                ]
            ),
            new Body(
                "add_manga",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([
                Rules::LOGIN_REQUIRED,
                Rules::ADMIN_ONLY,
                Rules::USER_CURRENT_ONLY
            ]),
            new AddMangaController()
        );
    }

    public static function getModule(): AddMangaModule|Module|null
    {
        if (self::$_add_manga === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'admin'))
            self::$_add_manga = new AddMangaModule();

        return self::$_add_manga;
    }
}
