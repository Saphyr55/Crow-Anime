<?php

namespace CrowAnime\Core\Forms\Entities;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Entities\User;
use CrowAnime\Core\Forms\Form;

class MangaForm extends Form
{
    private string $preview_path_replace;

    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->data['anime_synopsis'] = "";
        $this->data['anime_score'] = null;
    }

    private function checkFile()
    {
        if (file_exists("$_SERVER[DOCUMENT_ROOT]" . $this->preview_path_replace))
            unlink("$_SERVER[DOCUMENT_ROOT]" . $this->preview_path_replace);
    }

    public function build(): ?Manga
    {
        if (User::getCurrentUser() instanceof User)
            $this->preview_path_replace = "/assets/img/manga/preview_" . User::getCurrentUser()->getIdUser() . '.jpg';
        else
            $this->preview_path_replace = "";
        $this->checkFile();
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $uploaddir = getcwd() . DIRECTORY_SEPARATOR . '/assets/img/manga/';
        $datas = MangaForm::recoverDataForm();

        if (Form::check($datas)) {
            $manga = (new MangaForm($datas))->createManga();
            $name_file = "manga_picture";
            $upload_file = $uploaddir . basename($_FILES[$name_file]['name']);

            if (isset($_POST['submit'])) {
                $manga->sendDatabase();

                // recupere le dernier enregistrement
                $last_manga = (array)Database::getDatabase()->query("SELECT * FROM manga ORDER BY id_manga DESC")[0];
                $manga->setIdWork($last_manga['id_manga']);
                Form::upload_file($name_file, $allowed, $upload_file);
                rename(
                    "$_SERVER[DOCUMENT_ROOT]/assets/img/manga/" . $_FILES[$name_file]['name'],
                    "$_SERVER[DOCUMENT_ROOT]/assets/img/manga/" . $manga->getIdWork() . ".jpg"
                );
            }

            if (isset($_POST['preview'])) {
                Form::upload_file($name_file, $allowed, $upload_file);
                rename(
                    "$_SERVER[DOCUMENT_ROOT]/assets/img/manga/" . $_FILES[$name_file]['name'],
                    "$_SERVER[DOCUMENT_ROOT]" . $this->preview_path_replace
                );
            }

            return $manga;
        }
        return null;
    }

    public function createManga(): Manga
    {
        return new Manga(
            $this->data['manga_title_en'],
            $this->data['manga_title_ja'],
            $this->data['manga_finish'],
            $this->data['manga_synopsis'],
            $this->data['manga_publishing_house'],
            $this->data['manga_authors'],
            $this->data['manga_volumes'],
            $this->data['manga_date'],
        );
    }

    public static function recoverDataForm(): array
    {
        return [
            "manga_title_ja" => htmlspecialchars($_POST['title_ja']),
            "manga_title_en" => htmlspecialchars($_POST['title_en']),
            "manga_date" => htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))),
            "manga_finish" => htmlspecialchars($_POST['finish']) === "on",
            "manga_publishing_house" => htmlspecialchars($_POST['publishing_house']),
            "manga_authors" => htmlspecialchars($_POST['authors']),
            "manga_volumes" => isset($_POST['volumes']) ? htmlspecialchars($_POST['volumes']) : null
        ];
    }
}
