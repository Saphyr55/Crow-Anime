<?php

namespace CrowAnime\Modules;

use CrowAnime\App;
use CrowAnime\Core\Controllers\Entities\AddMangaController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class AddManga extends Module
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

    public static function getModule(): AddManga|Module|null
    {
        if (self::$_add_manga === null)
            self::$_add_manga = new Addmanga();

        return self::$_add_manga;
    }
}
