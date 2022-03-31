<?php

require_once './vendor/autoload.php';

use CrowAnime\App;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Backend\User;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Frontend\Modules\AddAnime;
use CrowAnime\Frontend\Modules\Animes;
use CrowAnime\Frontend\Modules\Home;
use CrowAnime\Frontend\Modules\Login;
use CrowAnime\Frontend\Modules\Logout;
use CrowAnime\Frontend\Modules\Mangas;
use CrowAnime\Frontend\Modules\ProfileAnime;
use CrowAnime\Frontend\Modules\ProfileManga;
use CrowAnime\Frontend\Modules\Signup;
use CrowAnime\Module;

session_start();
App::checkProfileURI();

$app = new App(
    [
        Home::getModule(),
        ProfileAnime::getModule(),
        ProfileManga::getModule(),
        Animes::getModule(),
        Mangas::getModule(),
        Signup::getModule(),
        Login::getModule(),
        Logout::getModule(),
        AddAnime::getModule()
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
