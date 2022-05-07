<?php

namespace CrowAnime\Core\Controllers\Admin;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Season;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Entities\AnimeForm;
use CrowAnime\Core\Language\Language;

class AddAnimeController extends Controller
{

    public function action(): void
    {
        $this->language(Language::getLanguage()->for('add_anime'));
        $animeForm = new AnimeForm();
        $anime = $animeForm->getAnime();
        $this->with(
            [
                'date' => $this->manage() ? htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))) : '',
                'title_en' => $this->manage() ? htmlspecialchars($_POST['title_en']) : '',
                'title_ja' => $this->manage() ? htmlspecialchars($_POST['title_ja']) : '',
                'studio' => $this->manage() ? htmlspecialchars($_POST['studio']) : '',
                'anime_synopsis' => $this->manage() ? htmlspecialchars($_POST['anime_synopsis']) : '',
                'spring' => Season::SPRING,
                'summer' => Season::SUMMER,
                'fall' => Season::FALL,
                'winter' => Season::WINTER,
                'allowed' => ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"],
                'uploaddir' => getcwd() . DIRECTORY_SEPARATOR . '/assets/img/anime/',
                'name_file' => 'anime_picture',
                'anime' => $anime,
                'url_image' => $this->urlImage($anime)
            ]
        );
    }

    private function manage(): bool
    {
        return isset($_POST['submit']) || isset($_POST['preview']);
    }

    private function urlImage($anime): string
    {
        $path_replace = (User::getCurrentUser() instanceof User) ?
            "/assets/img/anime/preview_" . User::getCurrentUser()->getIdUser() . '.jpg' :
            null;
        if (isset($_POST['submit']))
            return "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $anime->getIdWork() . '.jpg';
        elseif (isset($_POST['preview']))
            return "http://$_SERVER[HTTP_HOST]$path_replace";
        else
            return "http://$_SERVER[HTTP_HOST]/assets/img/not_found.png";
    }


}
