<?php

use CrowAnime\App;
use CrowAnime\Core\Entities\User;
use CrowAnime\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Header;

require_once './vendor/autoload.php';

App::start();

$app = new App(
        CrowAnime\Modules\Error::getModule(),
        CrowAnime\Modules\Home::getModule(),
        CrowAnime\Modules\UserListAnime::getModule(),
        CrowAnime\Modules\UserListManga::getModule(),
        CrowAnime\Modules\Animes::getModule(),
        CrowAnime\Modules\Mangas::getModule(),
        CrowAnime\Modules\Signup::getModule(),
        CrowAnime\Modules\Login::getModule(),
        CrowAnime\Modules\Logout::getModule(),
        CrowAnime\Modules\AddAnime::getModule(),
        CrowAnime\Modules\AddManga::getModule(),
);
$app->run();

