<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Language\Language;

class UserListMangasController extends \CrowAnime\Core\Controllers\Controller
{
    public function action(): void
    {
        $this->language(Language::getLanguage()->for('user_list_mangas'));
        $this->with([
            'mangas' => User::getCurrentUserURI()->mangasView(),
        ]);
    }
}

