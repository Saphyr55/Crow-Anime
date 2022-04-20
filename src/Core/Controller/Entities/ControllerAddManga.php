<?php

namespace CrowAnime\Core\Controller\Entities;

use CrowAnime\Core\Controller\Controller;
use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Form\Form;
use CrowAnime\Core\Form\MangaForm;
use CrowAnime\Core\User;
use CrowAnime\Entities\Manga;

class ControllerAddManga extends Controller
{

    private string $preview_path_replace;

    public function __construct()
    {
        if (User::getCurrentUser() !== null)
            $this->preview_path_replace = "/assets/img/manga/preview_" . User::getCurrentUser()->getIdUser() . '.jpg';
        else
            $this->preview_path_replace = "";
        $manga = $this->build();
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

    private function check()
    {
        if (file_exists("$_SERVER[DOCUMENT_ROOT]".$this->preview_path_replace))
            unlink("$_SERVER[DOCUMENT_ROOT]".$this->preview_path_replace);
    }

    private function build(): ?Manga
    {
        $this->check();
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
                $last_manga = (array) Database::getDatabase()->query("SELECT * FROM manga ORDER BY id_manga DESC")[0];
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
                    "$_SERVER[DOCUMENT_ROOT]".$this->preview_path_replace
                );
            }

            return $manga;
        } return null;
    }

    public function action() : void
    {
        // TODO: Implement action() method.
    }
}