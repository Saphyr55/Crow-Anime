<?php

namespace CrowAnime\Core\Controllers\Users;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Language\Language;

class UserListMangasController extends Controller
{
    public function action(): void
    {
        $this->language(Language::getLanguage()->for('user_list_mangas'));
        $this->with([
            'mangas' => User::getCurrentUserURI()->mangasView(),
        ]);
    }
}

