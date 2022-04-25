<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Language\Language;

class HeaderController extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $language = Language::getLanguage();
        $language->switchLanguage();
        $this->language($language->for('header'));
        $this->with([
            'current_language' => strtoupper(Language::getLanguage()->getCurrentLanguage()),
            'exist_user' => $this->issetUser(),
            'header_username' => ($this->issetUser()) ? $_SESSION['user']->getUsername() : 'null',
            'is_admin' => $this->issetUser() && $_SESSION['user']->isAdmin()
        ]);
    }

    private function issetUser(): bool
    {
        return isset($_SESSION['user']);
    }

}