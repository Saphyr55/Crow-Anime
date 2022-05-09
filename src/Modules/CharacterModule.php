<?php 

namespace CrowAnime\Modules ;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

class CharacterModule extends Module {

    private static ?Module $_character = null;

    public function __construct () {

        parent::__construct(
            "character/idCharacter",
            new head("Crow Anime - Nom du character", ["character"]),
            new Body(
                "character",
                Header::getHeader(),
                Footer::getFooter()
            ),
            new Rules([Rules::ALL])
        );

    }


    public static function getModule(): CharacterModule|Module|null
    {
        if(self::$_character === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'character'))
            self::$_character = new CharacterModule();
     
        return self::$_character;
    }

}
