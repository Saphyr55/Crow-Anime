<?php

namespace CrowAnime\Core\Controllers\Auths;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Module;
use CrowAnime\Router\Router;

class LogoutController extends Controller
{

    public function action(): void
    {
        if (isset($_SESSION['user']))
            session_destroy();
        header("Location: http://$_SERVER[HTTP_HOST]" . Router::uri());
        exit();
    }
}