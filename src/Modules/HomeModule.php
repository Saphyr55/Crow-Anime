<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Components\HomeController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /home
 */
class HomeModule extends Module
{
    const TITLE = "Crow Anime - Home";
    const PATH = "home";

    private static ?Module $_home = null;

    public function __construct()
    {
        parent::__construct(
            HomeModule::PATH,
            new Head(HomeModule::TITLE, ['home']
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

    public static function getModule(): HomeModule|Module|null
    {
        if (self::$_home === null) {
            self::$_home = new HomeModule();
        }
        return self::$_home;
    }
}
