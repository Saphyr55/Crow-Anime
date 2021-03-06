<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Entities\NewsController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /news
 */
class NewsModule extends \CrowAnime\Module
{

    private static ?Module $module = null;

    public function __construct()
    {
        parent::__construct(
            'news',
            new Head('CrowAnime - NewsModule', ['news']),
            new Body('news', Header::getHeader(), Footer::getFooter()),
            new Rules([Rules::ALL]),
            new NewsController());
    }

    public static function getModule(): Module|null
    {
        if(self::$module === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'news'))
            self::$module = new NewsModule();
        return self::$module;
    }

}