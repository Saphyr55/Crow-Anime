<?php

namespace CrowAnime\Core\Controller\AuthController;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Form\Auth\LoginForm;

class ControllerLogin extends Controller
{
    private LoginForm $userForm;

    public function __construct()
    {
        $this->userForm = new LoginForm();
        $this->userForm->login();
        $this->with([
            'error' => $this->userForm->getErrorMsg()
        ]);
    }

    public function action(): void
    {
        // TODO: Implement action() method.
    }
}