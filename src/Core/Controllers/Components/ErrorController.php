<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Errors\Error;

class ErrorController extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $this->with([
            'error_msg' => Error::get()
        ]);
    }
}