<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controller\Entities\ControllerMangas;
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

        $this->nameModule = Mangas::PATH;

        $this->head =  new Head(
            Mangas::TITLE,
            [
                $this->nameModule,
            ]
        );

        $this->body = new Body(
            $this->nameModule,
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::ALL,
        ]);

        $this->controller = new ControllerMangas();

        parent::__construct(
            $this->nameModule,
            $this->head,
            $this->body,
            $this->rules,
            $this->controller
        );

    }

    public static function getModule(): Module|Mangas|null
    {
        if (self::$_mangas === null)
            self::$_mangas = new Mangas();

        return self::$_mangas;
    }
}
