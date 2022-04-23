<?php

namespace CrowAnime\Modules;

use CrowAnime\Core\Controllers\Entities\UserListMangasController;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class UserListManga extends Module
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

    public static function getModule(): UserListManga|Module|null
    {
        if(self::$profileMangas === null)
            self::$profileMangas = new UserListManga();
            
        return self::$profileMangas;
    }

}