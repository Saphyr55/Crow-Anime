<?php

namespace CrowAnime\Core\Controller\AuthController;

use CrowAnime\Core\Controller\Controller;

class ControllerLogout extends Controller
{

    public function __construct()
    {
        $this->with([]);
    }

    public function action() : void
    {
        if (isset($_SESSION['user']))
            session_destroy();
        header("Location: http://$_SERVER[HTTP_HOST]");
        exit();
    }
}