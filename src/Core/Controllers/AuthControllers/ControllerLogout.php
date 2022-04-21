<?php

namespace CrowAnime\Core\Controllers\AuthControllers;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Module;
use CrowAnime\Router\Router;

class ControllerLogout extends Controller
{

    public function action(): void
    {
        error_log("http://$_SERVER[HTTP_HOST]" . Router::uri());
        if (isset($_SESSION['user']))
            session_destroy();
        header("Location: http://$_SERVER[HTTP_HOST]" . Router::uri());
        exit();
    }
}