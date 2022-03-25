<?php

require_once './vendor/autoload.php';

use CrowAnime\App;
use CrowAnime\Backend\Body;
use CrowAnime\Backend\Head;
use CrowAnime\Module;

$app = new App([
    new Module(
        new Head(
            "Home",
            "/src/CrowAnime/frontend/css/home.css"
        ),
        new Body(
            "/src/CrowAnime/frontend/components/home.php"
        )
    )
]);
$app->run();