<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Components\HomeController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Home extends Module
{
    const TITLE = "Crow Anime - Home";
    const PATH = "home";

    private static ?Module $_home = null;

    public function __construct()
    {
        parent::__construct(
            Home::PATH,
            new Head(Home::TITLE, ['home']
            ),
            new Body(
                'home',
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([
                Rules::ALL,
            ]),
            new HomeController()
        );
    }

    public static function getModule(): Home|Module|null
    {
        if (self::$_home === null) {
            self::$_home = new Home();
        }
        return self::$_home;
    }
}
