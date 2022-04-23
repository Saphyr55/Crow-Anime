<?php

namespace CrowAnime\Modules;

use CrowAnime\App;
use CrowAnime\Core\Controllers\Entities\AddAnimeController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;
use CrowAnime\Router\Router;
use phpDocumentor\Reflection\Types\This;

class AddAnime extends Module
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

    public static function getModule(): Module|AddAnime|null
    {
        if (self::$_add_anime === null)
            self::$_add_anime = new AddAnime();

        return self::$_add_anime;
    }
}
