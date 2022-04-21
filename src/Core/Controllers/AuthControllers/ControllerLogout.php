<?php

namespace CrowAnime\Core\Controllers\AuthControllers;

use CrowAnime\Core\Controllers\Controller;
use JetBrains\PhpStorm\NoReturn;

class ControllerLogout extends Controller
{
    public function action() : void
    {
        $this->with([]);
        if (isset($_SESSION['user']))
            session_destroy();
        header("Location: http://$_SERVER[HTTP_HOST]");
        exit();
    }
}