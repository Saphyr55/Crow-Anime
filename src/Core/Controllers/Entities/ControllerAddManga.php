<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Entities\MangaForm;
use CrowAnime\Core\Forms\Form;

class ControllerAddManga extends Controller
{

    public function action() : void
    {
        $manga = (new MangaForm())->build();
        $this->with(
            [
                'preview_path_replace' => $this->preview_path_replace,
                'manage_bool' => isset($_POST['submit']) || isset($_POST['preview']),
                'allowed' => ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"],
                'uploaddir' => getcwd() . DIRECTORY_SEPARATOR . '/assets/img/manga/',
                'name_file' => 'manga_picture',
                'manga' => $manga
            ]
        );
    }
}