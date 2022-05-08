<?php

namespace CrowAnime\Modules;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Entities\MangasController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /mangas
 */
class MangasModule extends Module
{
    const TITLE = "Crow Anime - All MangasModule";
    const PATH = "mangas";

    private static ?Module $_mangas = null;

    public function __construct()
    {
        parent::__construct(
            MangasModule::PATH,
            new Head(
                MangasModule::TITLE,
                [
                    'mangas', 'sort'
                ]
            ),
            new Body(
                'mangas',
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([
                Rules::ALL,
            ]),
            new MangasController()
        );

    }

    public static function getModule(): Module|MangasModule|null
    {
        if (self::$_mangas === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'mangas') )
            self::$_mangas = new MangasModule();

        return self::$_mangas;
    }
}
