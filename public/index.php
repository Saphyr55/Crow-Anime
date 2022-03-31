<?php

require_once '../vendor/autoload.php';

use CrowAnime\App;
use CrowAnime\Backend\Head;
use CrowAnime\Backend\Rules;
use CrowAnime\Backend\User;
use CrowAnime\Frontend\Body;
use CrowAnime\Frontend\Footer;
use CrowAnime\Frontend\Header;
use CrowAnime\Module;

$header = new Header("../src/Frontend/components/header.php"); // creation du header
$footer = new Footer("../src/Frontend/components/footer.php"); // creation du footer

session_start();
App::checkProfileURI();

$app = new App(
    [
        // Home
        Home::getHome(),

        // <profils>/animes
        new Module(
            "profile/" . User::getCurrentUsernameURI() . "/animeslist",
            new Head(
                User::getCurrentUsernameURI() . " : Anime List",
                [
                    "../src/Frontend/css/profile_animes.css",
                ]
            ),
            new Body(
                "../src/Frontend/components/profile_animes.php",
                $header,
                $footer
            ), new Rules([
                Rules::ALL,
            ])
        ),

        // <profils>/mangas
        new Module(
            "profile/" . User::getCurrentUsernameURI() . "/mangaslist",
            new Head(
                User::getCurrentUsernameURI() . " : Manga List",
                [
                    "../src/Frontend/css/profile_mangas.css",
                ]
            ),
            new Body(
                "../src/Frontend/components/profile_mangas.php",
                $header,
                $footer
            ), new Rules([
                Rules::ALL,
            ])
        ),

        // All Animes
        new Module(
            "animes",
            new Head(
                "CrowAnime - All Animes",
                [
                    "src/Frontend/css/animes.css",
                ]
            ),
            new Body(
                "../src/Frontend/components/animes.php",
                $header,
                $footer
            ), new Rules([
                Rules::ALL,
            ])
        ),

        // All Mangas
        new Module(
            "mangas",
            new Head(
                "CrowAnime - All Mangas",
                [
                    "../src/Frontend/css/mangas.css",
                ]
            ),
            new Body(
                "../src/Frontend/components/mangas.php",
                $header,
                $footer
            ), new Rules([
                Rules::ALL,
            ])
        ),

        // Page d'inscription
        new Module(
            "signup",
            new Head(
                "CrowAnime - Sign Up",
                [
                    "../src/Frontend/css/signup.css",
                ]
            ),
            new Body(
                "../src/Frontend/components/signup.php",
                null,
                null
            ), new Rules([
                Rules::TO_BE_NOT_LOGIN,
            ])
        ),

        // Page de connexion
        new Module(
            "login",
            new Head(
                "CrowAnime - Login",
                [
                    "../src/Frontend/css/login.css",
                ]
            ),
            new Body(
                "../src/Frontend/components/login.php",
                $header,
                $footer
            ), new Rules([
                Rules::TO_BE_NOT_LOGIN,
            ])
        ),

        // Page de deconnexion
        new Module(
            "logout",
            new Head(
                "CrowAnime - Logout", []
            ),
            new Body(
                "../src/Frontend/components/logout.php", null, null
            ), new Rules([
                Rules::LOGIN_REQUIRED,
            ])
        ),

        // page d'admistration d'ajout d'anime
        new Module(
            "admin/" . User::getCurrentUsernameURI() . "/add-anime",
            new Head(
                "Admin - Add anime", [
                    "../src/Frontend/css/add_anime.css",
                ]
            ),
            new Body(
                "../src/Frontend/components/add_anime.php", $header, $footer
            ), new Rules([
                Rules::ADMIN_ONLY,
            ])
        )
    ],
    // partie erreur
    new Module( # put an error page when the URL isn't found
        "not-found",
        new Head(
            "Page Not Found",
            []
        ),
        new Body(
            "../src/Frontend/components/not_found.php",
            $header,
            $footer
        ), new Rules([Rules::ALL])
    )
);

$app->run(); // Lancement de l'application
