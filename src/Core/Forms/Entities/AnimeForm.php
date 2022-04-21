<?php

namespace CrowAnime\Core\Forms\Entities;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Form;

class AnimeForm extends Form
{

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->data['anime_synopsis'] = "";
        $this->data['anime_score'] = null;
    }

    public function getAnime() : ?Anime
    {
        $path_replace = (User::getCurrentUser() instanceof User) ? "/assets/img/anime/preview_" . User::getCurrentUser()->getIdUser() . '.jpg' : null;
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

    public function createAnime(): Anime
    {
        return Anime::build(
            $this->data['anime_title_en'],
            $this->data['anime_title_ja'],
            $this->data['anime_finish'],
            $this->data['anime_synopsis'],
            $this->data['anime_season'],
            $this->data['anime_studio'],
            $this->data['anime_date']
        );
    }

    public static function recoverDataForm(): array
    {
        return
            [
                "anime_title_en" => htmlspecialchars($_POST['title_en']),
                "anime_title_ja" => htmlspecialchars($_POST['title_ja']),
                "anime_season" => htmlspecialchars($_POST['season_anime']),
                "anime_date" => htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))),
                "anime_studio" => htmlspecialchars($_POST['studio']),
                "anime_finish" => htmlspecialchars($_POST['finish']) === "on"
            ];
    }

    public function issetPreview($path_replace, $name_file, $allowed, $upload_file)
    {
        if (isset($_POST['preview'])) {
            Form::upload_file($name_file, $allowed, $upload_file);
            rename(
                "$_SERVER[DOCUMENT_ROOT]/assets/img/anime/" . $_FILES[$name_file]['name'],
                "$_SERVER[DOCUMENT_ROOT]$path_replace"
            );
        }
    }

    public function issetSubmit($anime, $name_file, $allowed, $upload_file)
    {
        if (isset($_POST['submit'])) {
            $anime->sendDatabase();

            // recover the last register
            $last_anime = (array) Database::getDatabase()->query("SELECT * FROM anime ORDER BY id_anime DESC")[0];

            $anime->setIdWork($last_anime['id_anime']);

            Form::upload_file($name_file, $allowed, $upload_file);
            rename(
                "$_SERVER[DOCUMENT_ROOT]/assets/img/anime/" . $_FILES[$name_file]['name'],
                "$_SERVER[DOCUMENT_ROOT]/assets/img/anime/" . $anime->getIdWork() . ".jpg"
            );
        }
    }
}
