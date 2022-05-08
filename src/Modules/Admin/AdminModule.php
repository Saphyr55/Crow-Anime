<?php

namespace CrowAnime\Modules\Admin;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Admin\AdminController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;

class AdminModule extends \CrowAnime\Module
{
    const TITLE = "Crow Anime - Admin";

    private static ?AdminModule $_admin = null;

    public function __construct()
    {
        parent::__construct(
            "admin/" . User::getCurrentUserURI()->getUsername(),
            new Head(self::TITLE, []),
            new Body(
                "admin",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([
                Rules::LOGIN_REQUIRED,
                Rules::ADMIN_ONLY,
                Rules::USER_CURRENT_ONLY
            ]),
            new AdminController()
        );
    }

    public static function getModule(): AdminModule|null
    {
        if (self::$_admin === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'admin'))
            self::$_admin = new AdminModule();

        return self::$_admin;
    }
}