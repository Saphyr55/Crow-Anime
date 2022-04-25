<?php

namespace CrowAnime\Modules\Profile;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Entities\UserListAnimesController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rules\Rules;
use CrowAnime\Module;

class UserListAnimeModule extends Module
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

    public static function getModule(): UserListAnimeModule|Module|null
    {
 
        if(self::$profileAnimes === null)
            self::$profileAnimes = new UserListAnimeModule();
        return self::$profileAnimes;
    }

}