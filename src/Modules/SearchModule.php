<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Components\SearchController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /search
 */
class SearchModule extends \CrowAnime\Module
{
    protected static ?Module $_search = null;

    public function __construct()
    {
        parent::__construct(
            "search",
            new Head('Crow Anime - Search', ['search', 'animes']),
            new Body('search', Header::getHeader(), Footer::getFooter() ),
            new Rules([
                Rules::ALL
           ]),
            new SearchController()
        );
    }

    public static function getModule(): Module|SearchModule|null
    {
        if (self::$_search === null && !strcmp(explode('/',explode('?', $_SERVER['REQUEST_URI'])[0])[1], 'search'))
            self::$_search = new SearchModule();

        return self::$_search;
    }

}