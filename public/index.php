<?php

require_once '../vendor/autoload.php';

use CrowAnime\App;
use CrowAnime\Backend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Module;

$app = new App([
    new Module("home",
        new Head(
            "Home",
            "/src/CrowAnime/Frontend/css/home.css"
        ),
        new Body(
            "/src/CrowAnime/Frontend/components/home.php"
        )
    )
], null);
$app->run();