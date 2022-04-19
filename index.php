<?php

use CrowAnime\App;
use CrowAnime\Core\Module;
use CrowAnime\Core\Rule\Rules;
use CrowAnime\Modules\Components\Body;
use CrowAnime\Modules\Components\Footer;
use CrowAnime\Modules\Components\Head;
use CrowAnime\Modules\Components\Header;

require_once './vendor/autoload.php';


session_start();
App::checkProfileURI();

$app = new App(
    [
        CrowAnime\Modules\Home::getModule(),
        CrowAnime\Modules\ProfileAnime::getModule(),
        CrowAnime\Modules\ProfileManga::getModule(),
        CrowAnime\Modules\Animes::getModule(),
        CrowAnime\Modules\Mangas::getModule(),
        CrowAnime\Modules\Signup::getModule(),
        CrowAnime\Modules\Login::getModule(),
        CrowAnime\Modules\Logout::getModule(),
        CrowAnime\Modules\AddAnime::getModule(),
        \CrowAnime\Modules\AddManga::getModule()
    ],
    // partie erreur
    new Module( # put an error page when the URL isn't found
        "not-found",
        new Head(
            "Page Not Found",
            []
        ),
        new Body(
            "not_found",
            Header::getHeader(),
            Footer::getFooter()
        ),
        new Rules([Rules::ALL])
    )
);

$app->run(); // Lancement de l'application
