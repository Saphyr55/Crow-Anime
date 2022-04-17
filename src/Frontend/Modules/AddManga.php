<?php 

namespace CrowAnime\Frontend\Modules;

use CrowAnime\App;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Backend\User;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

class AddManga extends Module
{
    private static ?Module $_add_manga = null;
    private string $nameModule;
    private Head $head;
    private Body $body;
    private Rules $rules;

    public function __construct() {
        App::checkProfileURI();

        $this->nameModule = 
            "admin/" . User::getCurrentUsernameURI() . "/add-manga";
        
        $this->head = new Head(
            "Admin - Add Manga", [
                "src/Frontend/css/add_anime.css",
            ]
        );
        
        $this->body = new Body(
            "src/Frontend/components/add_manga.php",
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
        if(self::$_add_manga === null)
            self::$_add_manga = new Addmanga();  
     
        return self::$_add_manga;
    }
}