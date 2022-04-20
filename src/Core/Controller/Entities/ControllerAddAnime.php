<?php

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Season;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Form\AnimeForm;
use CrowAnime\Core\Form\Form;

class ControllerAddAnime extends Controller
{
    public function __construct()
    {
        $anime = $this->build();
        $this->with(
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

    private function build() : ?Anime
    {
        $path_replace = (User::getCurrentUser() !== null) ? "/assets/img/anime/preview_" . User::getCurrentUser()->getIdUser() . '.jpg' : null;
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"];
        $upload_dir = getcwd() . DIRECTORY_SEPARATOR . '/assets/img/anime/';
        $name_file = 'anime_picture';
        $this->checkFile($path_replace);
        return $this->checkData(AnimeForm::recoverDataForm(), $path_replace, $name_file, $allowed, $upload_dir);
    }

    private function checkFile($path_replace)
    {
        if (file_exists("$_SERVER[DOCUMENT_ROOT]$path_replace"))
            unlink("$_SERVER[DOCUMENT_ROOT]$path_replace");
    }

    private function checkData($data, $path_replace, $name_file, $allowed, $upload_dir) : ?Anime
    {
        if (Form::check($data)) {
            $animeForm = new AnimeForm($data);
            $anime = $animeForm->createAnime();
            $upload_file = $upload_dir . basename($_FILES['anime_picture']['name']);
            $animeForm->issetSubmit($anime, $name_file, $allowed, $upload_file);
            $animeForm->issetPreview($path_replace, $name_file, $allowed, $upload_file);
            return $anime;
        }
        return null;
    }

    public function action() : void
    {

    }
}
