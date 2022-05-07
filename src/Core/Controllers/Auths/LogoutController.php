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
            unset($_SESSION['user']);
        Router::redirect(Router::uri());
    }
}