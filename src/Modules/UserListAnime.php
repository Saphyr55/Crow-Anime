<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Entities\UserListAnimesController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class UserListAnime extends Module
{
    
    private static ?Module $profileAnimes = null;

    public function __construct()
    {
        parent::__construct(
            "profile/" . User::getCurrentUserURI()->getUsername() . "/animes",
            new Head(
                User::getCurrentUserURI()->getUsername() . " : Anime List", [
                    "animes",
                    "user_list_animes",
                    'sort'
                ]
            ), new Body(
                "user_list_animes",
                Header::getHeader(),
                Footer::getFooter()
            ), new Rules([
                Rules::ALL,
            ]),
        new UserListAnimesController());
    }

    public static function getModule(): UserListAnime|Module|null
    {
 
        if(self::$profileAnimes === null)
            self::$profileAnimes = new UserListAnime();
        return self::$profileAnimes;
    }

}