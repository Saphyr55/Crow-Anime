<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Entities\ProfileAnimeController;
use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

class ProfileAnimeModule extends Module
{
    private static ?Module $profileAnime = null;

    public function __construct()
    {
        $anime = Anime::getCurrentAnimeURI();
        parent::__construct(
            'anime/'.$anime->getIdWork(),
            new Head('Crow Anime - '.$anime->getTitle_ja(),
                ['profile_anime']),
                new Body('profile_anime',
                    Header::getHeader(),
                    Footer::getFooter()
                ),
                new Rules([Rules::ALL]),
                new ProfileAnimeController()
            );
    }

    public static function getModule(): ProfileAnimeModule|null
    {
        if(self::$profileAnime === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'anime'))
            self::$profileAnime = new ProfileAnimeModule();
     
        return self::$profileAnime;
    }
}