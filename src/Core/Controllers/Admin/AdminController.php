<?php

namespace CrowAnime\Core\Controllers\Admin;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Language\Language;

class AdminController extends Controller
{

    public function action(): void
    {
        $this->language(Language::getLanguage()->for('admin'));

        Database::getDatabase()->query('SELECT * FROM anime');

        $this->with([
            ''
        ]);

    }
}