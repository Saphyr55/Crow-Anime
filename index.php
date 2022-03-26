<?php

require_once './vendor/autoload.php';

use CrowAnime\App;
use CrowAnime\Frontend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

$header = new Header("src/Frontend/components/header.php"); // creation du header
$footer = new Footer("src/Frontend/components/footer.php"); // creation du footer

$app = new App(
    [
        new Module(
            "home",
            new Head(
                "Home",
                [
                    "src/Frontend/css/home.css"
                ]
            ),
            new Body(
                "src/Frontend/components/home.php",
                $header,
                $footer
            )
        ),
        new Module(
            "profilanime",
            new Head(
                "Profil : Anime vus",
                [
                    "src/Frontend/css/profilanime.css"
                ]
            ),
            new Body(
                "src/Frontend/components/profilanime.php",
                $header,
                $footer
            )
        ),
        new Module(
            "profilmanga",
            new Head(
                "Profil : Manga vus",
                [
                    "src/Frontend/css/profilmanga.css"
                ]
            ),
            new Body(
                "src/Frontend/components/profilmanga.php",
                $header,
                $footer
            )
        )

    ],
    // partie erreur
    new Module( # put an error page when the URL isn't found
        "not_found",
        new Head(
            "Page Not Found",
            []
        ),
        new Body(
            "src/Frontend/components/notfound.php",
            $header,
            $footer
        )
    )
);
$app->run(); // Lancement de l'application
