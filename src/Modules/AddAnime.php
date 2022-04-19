<?php 

namespace CrowAnime\Modules;

use CrowAnime\App;
use CrowAnime\Core\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Core\User;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class AddAnime extends Module
{
    private static ?Module $_add_anime = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        App::checkProfileURI();

        $this->nameModule = 
            "admin/" . User::getCurrentUsernameURI() . "/add-anime";
        
        $this->head = new Head(
            "Admin - Add anime", [
                "add_anime",
            ]
        );
        
        $this->body = new Body(
            "add_anime",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::ADMIN_ONLY,
        ]);

        parent::__construct(
            $this->nameModule,
            $this->head, 
            $this->body, 
            $this->rules
        );
    }

    public static function getModule()
    {
        if(self::$_add_anime === null)
            self::$_add_anime = new AddAnime();  
     
        return self::$_add_anime;
    }
}