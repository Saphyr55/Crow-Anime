<?php

namespace CrowAnime\Core\Controllers\Auths;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Forms\Auths\LoginForm;
use CrowAnime\Core\Language\Language;
use CrowAnime\Module;

class LoginController extends Controller
{


    public function action(): void
    {
        $this->language(Language::getStrings()->for('login'));
        $userForm = new LoginForm();
        $userForm->login();
        $this->with([
            'error' => $userForm->getErrorMsg()
        ]);
    }
}