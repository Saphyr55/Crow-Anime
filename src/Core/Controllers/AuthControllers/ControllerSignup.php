<?php

namespace CrowAnime\Core\Controllers\AuthControllers;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Forms\Auths\SignupForm;
use CrowAnime\Core\Forms\Form;

class ControllerSignup extends Controller
{

    public function action(): void
    {
        $form = new SignupForm();
        $form->signup();
        $this->with([
            'error' => $form->getErrorMsg()
        ]);
    }
}