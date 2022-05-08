<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Entities\ProfileMangaController;
use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

/**
 * Module correspondant a la route racine ou /manga/{id_manga}
 */
class ProfileMangaModule extends Module
{
    private static ?Module $profileManga = null;

    public function __construct()
    {
        $manga = Manga::getCurrentMangaURI();
        parent::__construct(
            'manga/'.$manga->getIdWork(),
            new Head('Crow Anime - '.$manga->getTitle_ja(),
                ['profile_manga']),
                new Body('profile_manga',
                    Header::getHeader(),
                    Footer::getFooter()
                ),
                new Rules([Rules::ALL]),
                new ProfileMangaController()
            );

    }

    public static function getModule(): ProfileMangaModule|Module|null
    {
        if(self::$profileManga === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'manga'))
            self::$profileManga = new ProfileMangaModule();
     
        return self::$profileManga;
    }
}