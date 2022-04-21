<?php

namespace CrowAnime\Modules;

use CrowAnime\App;
use CrowAnime\Core\Controllers\Entities\ControllerAddManga;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Module;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

class AddManga extends Module
{
    private static ?Module $_add_manga = null;

    public function __construct()
    {
        $this->nameModule =
            "admin/" . User::getCurrentUserURI()->getUsername() . "/add-manga";

        $this->head = new Head(
            "Admin - Add Manga",
            [
                "add_anime",
            ]
        );

        $this->body = new Body(
            "add_manga",
            Header::getHeader(),
            Footer::getFooter()
        );

        $this->rules = new Rules([
            Rules::LOGIN_REQUIRED,
            Rules::ADMIN_ONLY,
            Rules::USER_CURRENT_ONLY
        ]);

        $this->controller = new ControllerAddManga();

        parent::__construct(
            $this->nameModule,
            $this->head,
            $this->body,
            $this->rules,
            $this->controller
        );
    }

    public static function getModule(): AddManga|Module|null
    {
        if (self::$_add_manga === null)
            self::$_add_manga = new Addmanga();

        return self::$_add_manga;
    }
}
