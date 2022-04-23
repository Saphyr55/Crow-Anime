<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Language\Language;

class FooterController extends \CrowAnime\Core\Controllers\Controller
{
    public function action(): void
    {
        $this->language(Language::getLanguage()->for('footer'));
        $this->with([]);
    }
}