<?php

require_once './vendor/autoload.php';

use CrowAnime\App;
use CrowAnime\Frontend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\User;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;


$header = new Header("src/Frontend/components/header.php"); // creation du header
$footer = new Footer("src/Frontend/components/footer.php"); // creation du footer

session_start();
App::checkProfileURI();

$app = new App(
    [
        // Home
        new Module(
            "home",
            new Head(
                "CrowAnime - Home",
                [
                    "src/Frontend/css/home.css"
                ]
            ),
            new Body(
                "src/Frontend/components/home.php",
                $header, $footer
            )
        ),
        // <profils>/animes
        new Module(
            "profile/" . User::getCurrentUsernameURI() . "/animeslist",
            new Head(
                User::getCurrentUsernameURI() . " : Anime List",
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
            "profile/" . User::getCurrentUsernameURI() . "/mangaslist",
            new Head(
                User::getCurrentUsernameURI() . " : Manga List",
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
                "CrowAnime - All Animes",
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
                "CrowAnime - All Mangas",
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
        // Page d'inscription
        new Module(
            "signup",
            new Head(
                "CrowAnime - Sign Up",
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
        // Page de connexion
        new Module(
            "login",
            new Head(
                "CrowAnime - Login",
                [
                    "src/Frontend/css/login.css"
                ]
            ),
            new Body(
                "src/Frontend/components/login.php",
                $header,
                $footer
            )
        ),
        // Page de deconnexion
        new Module(
            "logout",
            new Head(
                "CrowAnime - Logout", []
            ),
            new Body(
                "src/Frontend/components/logout.php", null, null
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
