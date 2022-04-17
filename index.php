<?php

require_once './vendor/autoload.php';

use CrowAnime\App;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

session_start();
App::checkProfileURI();

$app = new App(
    [
        CrowAnime\Frontend\Modules\Home::getModule(),
        CrowAnime\Frontend\Modules\ProfileAnime::getModule(),
        CrowAnime\Frontend\Modules\ProfileManga::getModule(),
        CrowAnime\Frontend\Modules\Animes::getModule(),
        CrowAnime\Frontend\Modules\Mangas::getModule(),
        CrowAnime\Frontend\Modules\Signup::getModule(),
        CrowAnime\Frontend\Modules\Login::getModule(),
        CrowAnime\Frontend\Modules\Logout::getModule(),
        CrowAnime\Frontend\Modules\AddAnime::getModule(),
        \CrowAnime\Frontend\Modules\AddManga::getModule()
    ],
    // partie erreur
    new Module( # put an error page when the URL isn't found
        "not-found",
        new Head(
            "Page Not Found",
            []
        ),
        new Body(
            "src/Frontend/components/not_found.php",
            Header::getHeader(),
            Footer::getFooter()
        ), new Rules([Rules::ALL])
    )
);

$app->run(); // Lancement de l'application
