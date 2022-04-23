<?php

namespace CrowAnime\Core\Controllers\Auths;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Forms\Auths\SignupForm;
use CrowAnime\Core\Language\Language;
use CrowAnime\Module;

class SignupController extends Controller
{

    public function action(): void
    {
        $this->language(Language::getLanguage()->for('signup'));
        $form = new SignupForm();
        $form->signup();
        $this->with([
            'error' => $form->getErrorMsg()
        ]);
    }
}