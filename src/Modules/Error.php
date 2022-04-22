<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Components\ErrorController;
use CrowAnime\Core\Errors\CAError;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Error extends \CrowAnime\Module
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
            self::$module = new Error();
        return self::$module;
    }

}