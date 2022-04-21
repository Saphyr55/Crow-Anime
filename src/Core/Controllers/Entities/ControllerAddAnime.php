<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Season;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Entities\AnimeForm;
use CrowAnime\Core\Forms\Form;

class ControllerAddAnime extends Controller
{

    public function action() : void
    {
        $animeForm = new AnimeForm();
        $anime = $animeForm->getAnime();
        $this->with(
            [
                'spring' => Season::SPRING,
                'summer' => Season::SUMMER,
                'fall' => Season::FALL,
                'winter' => Season::WINTER,
                'path_replace' => (User::getCurrentUser() instanceof User) ? "/assets/img/anime/preview_" . User::getCurrentUser()->getIdUser() . '.jpg' : null,
                'manage_bool' => isset($_POST['submit']) || isset($_POST['preview']),
                'allowed' => ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"],
                'uploaddir' => getcwd() . DIRECTORY_SEPARATOR . '/assets/img/anime/',
                'name_file' => 'anime_picture',
                'anime' => $anime
            ]
        );
    }

}
