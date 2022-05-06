<?php

namespace CrowAnime\Modules\Profile;

use CrowAnime\Components\Body;
use CrowAnime\Components\Footer;
use CrowAnime\Components\Head;
use CrowAnime\Components\Header;
use CrowAnime\Core\Controllers\Users\UserListMangasController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;

class UserListMangaModule extends Module
{
    
    private static ?Module $profileMangas = null;

    public function __construct() 
    {
        parent::__construct(
            "profile/" . User::getCurrentUserURI()->getUsername() . "/mangas",
            new Head(User::getCurrentUserURI()->getUsername() . " : Manga List", ["mangas", "user_list_mangas",'sort']),
            new Body("user_list_mangas", Header::getHeader(), Footer::getFooter()),
            new Rules([Rules::ALL,]),
            new UserListMangasController()
        );
    }

    public static function getModule(): UserListMangaModule|Module|null
    {
        if(self::$profileMangas === null && !strcmp(explode('/',explode('?',$_SERVER['REQUEST_URI'])[0])[1], 'profile'))
            self::$profileMangas = new UserListMangaModule();
            
        return self::$profileMangas;
    }

}