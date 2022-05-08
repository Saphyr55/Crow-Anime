<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Components\ErrorController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route /not-found
 */
class ErrorModule extends \CrowAnime\Module
{
    private static ?Module $module = null;

    private function __construct()
    {
        parent::__construct(
            "not-found",
            new Head(
                "Page Not Found",
                []
            ),
            new Body(
                "not_found",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([Rules::ALL]),
            new ErrorController()
        );
    }

    public static function getModule(): Module|null
    {
        if(self::$module === null)
            self::$module = new ErrorModule();
        return self::$module;
    }

}