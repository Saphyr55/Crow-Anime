<?php

namespace CrowAnime\Modules\Ajax;

use CrowAnime\Components\Body;
use CrowAnime\Components\Head;
use CrowAnime\Core\Controllers\Ajax\AjaxController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

class AjaxModule extends \CrowAnime\Module
{
    private static ?Module $ajax = null;

    public function __construct()
    {
        parent::__construct(
            "ajax/ajax",
            null,
            null,
            new Rules([Rules::ADMIN_ONLY]),
            new AjaxController()
        );
    }

    public static function getModule(): Module|null
    {
        if(self::$ajax === null && !strcmp(explode('/',explode('?', $_SERVER['REQUEST_URI'])[0])[1], 'ajax'))
            self::$ajax = new AjaxModule();

        return self::$ajax;
    }

}