<?php

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\User;
use CrowAnime\Form\Form;
use CrowAnime\Work\Season;
use CrowAnime\Form\AnimeForm;
use CrowAnime\Database\Database;
use CrowAnime\Core\Controller\Controller;

class ControllerAddAnime extends Controller
{
    public function __construct()
    {
        $anime = $this->build();
        $this->datas = $this->with(
            [
                'spring' => Season::SPRING,
                'summer' => Season::SUMMER,
                'fall' => Season::FALL,
                'winter' => Season::WINTER,
                'path_replace' => (User::getCurrentUser() !== null) ? "/assets/img/anime/preview_" . User::getCurrentUser()->getIdUser() . '.jpg' : null,
                'manage_bool' => isset($_POST['submit']) || isset($_POST['preview']),
                'allowed' => ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"],
                'uploaddir' => getcwd() . DIRECTORY_SEPARATOR . '/assets/img/anime/',
                'name_file' => 'anime_picture',
                'anime' => $anime
            ]
        );
    }

    private function build()
    {
        $path_replace = (User::getCurrentUser() !== null) ? "/assets/img/anime/preview_" . User::getCurrentUser()->getIdUser() . '.jpg' : null;
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"];
        $uploaddir = getcwd() . DIRECTORY_SEPARATOR . '/assets/img/anime/';
        $name_file = 'anime_picture';
        $this->checkFile($path_replace);
        $anime = $this->checkData(AnimeForm::recupDataForm(), $path_replace, $name_file, $allowed, $uploaddir);
        if ($anime === null) $anime = "";
        return $anime;
    }

    private function checkFile($path_replace)
    {
        if (file_exists("$_SERVER[DOCUMENT_ROOT]$path_replace"))
            unlink("$_SERVER[DOCUMENT_ROOT]$path_replace");
    }

    private function checkData($datas, $path_replace, $name_file, $allowed, $uploaddir)
    {
        if (Form::check($datas)) {
            $animeForm = new AnimeForm($datas);
            $anime = $animeForm->createAnime();
            $uploadfile = $uploaddir . basename($_FILES['anime_picture']['name']);
            $animeForm->issetSubmit($anime, $name_file, $allowed, $uploadfile);
            $animeForm->issetPreview($path_replace, $name_file, $allowed, $uploadfile);
            return $anime;
        }
    }
}
