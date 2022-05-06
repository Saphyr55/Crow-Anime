<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Entities\MangaForm;
use CrowAnime\Core\Language\Language;
use CrowAnime\Module;

class AddMangaController extends Controller
{

    public function action(): void
    {
        $this->language(Language::getLanguage()->for('add_manga'));
        $manga = (new MangaForm())->build();
        $this->with(
            [
                'date' => $this->manage() ? htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))) : '',
                'title_en' => $this->manage() ? htmlspecialchars($_POST['title_en']) : '',
                'title_ja' => $this->manage() ? htmlspecialchars($_POST['title_ja']) : '',
                'manga_synopsis' => $this->manage() ? htmlspecialchars($_POST['manga_synopsis']) : '',
                'publishing_house' => $this->manage() ? htmlspecialchars($_POST['publishing_house']) : '',
                'authors' => $this->manage() ? htmlspecialchars($_POST['authors'] ) : '',
                'manage_bool' => isset($_POST['submit']) || isset($_POST['preview']),
                'allowed' => ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"],
                'uploaddir' => getcwd() . DIRECTORY_SEPARATOR . '/assets/img/manga/',
                'name_file' => 'manga_picture',
                'manga' => $manga,
                'url_image' => $this->urlImage($manga)
            ]
        );
    }

    private function manage(): bool
    {
        return isset($_POST['submit']) || isset($_POST['preview']);
    }

    private function urlImage($manga): string
    {
        $path_replace = (User::getCurrentUser() instanceof User) ?
            "/assets/img/manga/preview_" . User::getCurrentUser()->getIdUser() . '.jpg' :
            null;
        if (isset($_POST['submit']))
            return "/assets/img/manga/" . $manga->getIdWork() . '.jpg';
        elseif (isset($_POST['preview']))
            return "$path_replace";
        else
            return "/assets/img/not_found.png";
    }

}