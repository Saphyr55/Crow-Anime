<?php

namespace CrowAnime\Core\Controllers\AuthControllers;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Forms\Auths\LoginForm;

class ControllerLogin extends Controller
{
    public function action(): void
    {
        $userForm = new LoginForm();
        $userForm->login();
        $this->with([
            'error' => $userForm->getErrorMsg()
        ]);
    }
}