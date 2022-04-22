<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Entities\Path;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Language\Language;

class UserListMangasController extends \CrowAnime\Core\Controllers\Controller
{
    public function action(): void
    {
        $this->language(Language::getStrings()->for('user_list_mangas'));
        $this->with([
            'mangas' => User::getCurrentUserURI()->mangasView(),
        ]);
    }
}

