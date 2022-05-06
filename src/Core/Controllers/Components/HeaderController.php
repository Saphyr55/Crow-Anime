<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Language\Language;
use CrowAnime\Router\Router;

class HeaderController extends Controller
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
            'is_admin' => $this->issetUser() && $_SESSION['user']->isAdmin(),
        ]);
        $this->search();

    }

    private function search()
    {
        if (isset($_POST['search_submit']))
            Router::redirect("search?request=".htmlspecialchars($_POST['request']));
    }

    private function issetUser(): bool
    {
        return isset($_SESSION['user']);
    }

}