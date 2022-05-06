<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Errors\Error;

class ErrorController extends Controller
{

    public function action(): void
    {
        $this->with([
            'error_msg' => Error::get()
        ]);
    }
}