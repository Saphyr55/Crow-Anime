<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Entities\AnimesController;
use CrowAnime\Core\Rules\Rules;
use CrowAnime\Module;

class AnimesModule extends Module
{
    private static ?Module $_animes = null;

    public function __construct()
    {
        parent::__construct(
            "animes",
            new Head("Crow Anime - All AnimesModule", ["animes",'sort']),
            new Body(
                "animes",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([Rules::ALL]),
            new AnimesController()
        );
    }

    public static function getModule(): AnimesModule|Module|null
    {
        if(self::$_animes === null)
            self::$_animes = new AnimesModule();
     
        return self::$_animes;
    }

}