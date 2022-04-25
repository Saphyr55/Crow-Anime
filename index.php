<?php

use CrowAnime\App;

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

