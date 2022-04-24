<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Entities\UserProfileController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class UserProfile extends Module
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

    public static function getModule(): Module|AddAnime|null
    {
        if (self::$module === null)
            self::$module = new UserProfile();

        return self::$module;
    }

}