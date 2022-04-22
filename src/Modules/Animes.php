<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Components\AnimesController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Animes extends Module
{
    private static ?Module $_animes = null;

    public function __construct()
    {
        parent::__construct(
            "animes",
            new Head("Crow Anime - All Animes", ["animes",'sort']),
            new Body(
                "animes",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([Rules::ALL]),
            new AnimesController()
        );
    }

    public static function getModule(): Animes|Module|null
    {
        if(self::$_animes === null)
            self::$_animes = new Animes();
     
        return self::$_animes;
    }

}