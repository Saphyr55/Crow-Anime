<?php

namespace CrowAnime\Core\Controller\AuthController;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Form\Auth\SignupForm;
use CrowAnime\Core\Form\Form;

class ControllerSignup extends Controller
{
    private Form $form;

    public function __construct()
    {
        $this->form = new SignupForm();
        $this->form->signup();
        $this->with([
            'error' => $this->form->getErrorMsg()
        ]);
    }

    public function action(): void
    {
        // TODO: Implement action() method.
    }
}