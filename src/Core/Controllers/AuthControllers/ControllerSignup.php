<?php

namespace CrowAnime\Core\Controllers\AuthControllers;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Forms\Auths\SignupForm;
use CrowAnime\Core\Language\Language;
use CrowAnime\Module;

class ControllerSignup extends Controller
{

    public function action(): void
    {
        $this->language(Language::getInstance()->for('signup'));
        $form = new SignupForm();
        $form->signup();
        $this->with([
            'error' => $form->getErrorMsg()
        ]);
    }
}