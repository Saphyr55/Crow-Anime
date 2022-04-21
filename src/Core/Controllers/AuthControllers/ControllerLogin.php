<?php

namespace CrowAnime\Core\Controllers\AuthControllers;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Forms\Auths\LoginForm;
use CrowAnime\Core\Language\Language;
use CrowAnime\Module;

class ControllerLogin extends Controller
{


    public function action(): void
    {
        $this->language(Language::getInstance()->for('login'));
        $userForm = new LoginForm();
        $userForm->login();
        $this->with([
            'error' => $userForm->getErrorMsg()
        ]);
    }
}