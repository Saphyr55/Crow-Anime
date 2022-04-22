<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Components\MangasController;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class Mangas extends Module
{
    const TITLE = "Crow Anime - All Mangas";
    const PATH = "mangas";

    private static ?Module $_mangas = null;

    public function __construct()
    {
        parent::__construct(
            Mangas::PATH,
            new Head(
                Mangas::TITLE,
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

    public static function getModule(): Module|Mangas|null
    {
        if (self::$_mangas === null)
            self::$_mangas = new Mangas();

        return self::$_mangas;
    }
}
