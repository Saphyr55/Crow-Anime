<?php

namespace CrowAnime\Modules;

use CrowAnime\App;
use CrowAnime\Core\Controllers\Entities\ControllerAddAnime;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class AddAnime extends Module
{
    private static ?Module $_add_anime = null;

    public function __construct()
    {
        $this->nameModule = "admin/" . User::getCurrentUserURI()->getUsername() . "/add-anime";
        $this->head = new Head("Admin - Add anime", ["add_anime"]);
        $this->body = new Body(
            "add_anime",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::LOGIN_REQUIRED,
            Rules::ADMIN_ONLY,
            Rules::USER_CURRENT_ONLY
        ]);

        $this->controller = new ControllerAddAnime();

        parent::__construct(
            $this->nameModule,
            $this->head,
            $this->body,
            $this->rules,
            $this->controller
        );
    }

    public static function getModule(): Module|AddAnime|null
    {
        if (self::$_add_anime === null)
            self::$_add_anime = new AddAnime();

        return self::$_add_anime;
    }
}
