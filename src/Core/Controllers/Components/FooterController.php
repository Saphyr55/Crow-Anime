<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Language\Language;

class FooterController extends Controller
{
    public function action(): void
    {
        $this->language(Language::getLanguage()->for('footer'));
        $this->with([]);
    }
}