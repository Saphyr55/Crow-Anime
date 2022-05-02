<?php

namespace CrowAnime\Modules\Profile;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Entities\UserProfileController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Admin\AddAnimeModule;

class UserProfileModule extends Module
{
    private static ?Module $module = null;

    public function __construct()
    {
        parent::__construct(
            'profile/' . User::getCurrentUserURI()->getUsername(),
            new Head(
                User::getCurrentUserURI()->getUsername(). '\'s' . ' Profile - CrowAnime',
                ['user_profile']
            ),
            new Body(
                'user_profile',
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules(
                [Rules::ALL]
            ),
            new UserProfileController());
    }

    public static function getModule(): Module|AddAnimeModule|null
    {
        if (self::$module === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'profile'))
            self::$module = new UserProfileModule();

        return self::$module;
    }

}