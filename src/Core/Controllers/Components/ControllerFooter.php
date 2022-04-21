<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Language\Language;

class ControllerFooter extends \CrowAnime\Core\Controllers\Controller
{
    public function action(): void
    {
        $this->language(Language::getInstance()->for('footer'));
        $this->with([]);
    }
}