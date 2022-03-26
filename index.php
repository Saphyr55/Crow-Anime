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

$profile = "Saphyr";

$app = new App(
    [
        // Home
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
        // <profils>/animes
        new Module(
            "$profile/animes",
            new Head(
                "$profile : Anime vus",
                [
                    "src/Frontend/css/profile_animes.css"
                ]
            ),
            new Body(
                "src/Frontend/components/profile_animes.php",
                $header,
                $footer
            )
        ),
        // <profils>/mangas
        new Module(
            "$profile/mangas",
            new Head(
                "$profile : Manga vus",
                [
                    "src/Frontend/css/profile_mangas.css"
                ]
            ),
            new Body(
                "src/Frontend/components/profile_mangas.php",
                $header,
                $footer
            )
        ),
        // All Animes
        new Module(
            "animes",
            new Head(
                "All Animes",
                [
                    "src/Frontend/css/animes.css"
                ]
            ),
            new Body(
                "src/Frontend/components/animes.php",
                $header,
                $footer
            )
        ),
        // All Mangas
        new Module(
            "mangas",
            new Head(
                "All Mangas",
                [
                    "src/Frontend/css/mangas.css"
                ]
                ),
                new Body(
                    "src/Frontend/components/mangas.php",
                    $header,
                    $footer
                )
        ),
        // Page de connexion
        new Module(
            "signup",
            new Head(
                "Signup",
                [
                    "src/Frontend/css/signup.css"
                ]
            ),
            new Body(
                "src/Frontend/components/signup.php",
                null,
                null
            )
        ),
        // Page d'inscription
        new Module(
            "login",
            new Head(
                "Login",
                [
                    "src/Frontend/css/login.css"
                ]
            ),
            new Body(
                "src/Frontend/components/login.php",
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
            "src/Frontend/components/not_found.php",
            $header,
            $footer
        )
    )
);
$app->run(); // Lancement de l'application
