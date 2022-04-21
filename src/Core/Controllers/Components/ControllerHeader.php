<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Language\Language;

class ControllerHeader extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $this->language(Language::getInstance()->for('header'));
        $this->with([
            'exist_user' => $this->issetUser(),
            'header_username' => ($this->issetUser()) ? $_SESSION['user']->getUsername() : 'null',
            'is_admin' => $this->issetUser() && $_SESSION['user']->isAdmin()
        ]);
    }

    private function issetUser()
    {
        return isset($_SESSION['user']);
    }

}