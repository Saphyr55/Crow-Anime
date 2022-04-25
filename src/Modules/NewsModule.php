<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

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
            null);
    }

    public static function getModule(): Module|null
    {
        if(self::$module === null)
            self::$module = new NewsModule();
        return self::$module;
    }

}