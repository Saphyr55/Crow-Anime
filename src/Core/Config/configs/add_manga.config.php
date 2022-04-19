<?php

use CrowAnime\Core\User;
use CrowAnime\Database\Database;
use CrowAnime\Form\Form;
use CrowAnime\Form\MangaForm;

$preview_path_replace = "/assets/img/manga/preview_" . User::getCurrentUser()->getIdUser() . ".jpg";
if (file_exists("$_SERVER[DOCUMENT_ROOT]$preview_path_replace"))
    unlink("$_SERVER[DOCUMENT_ROOT]$preview_path_replace");

$manage_bool = isset($_POST['submit']) || isset($_POST['preview']);
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
$uploaddir = getcwd() . DIRECTORY_SEPARATOR . '/assets/img/manga/';
$datas = [
    "manga_title_ja" => htmlspecialchars($_POST['title_ja']),
    "manga_title_en" => htmlspecialchars($_POST['title_en']),
    "manga_date" => htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))),
    "manga_finish" => (htmlspecialchars($_POST['finish']) === "on") ? true : false,
    "manga_publishing_house" => htmlspecialchars($_POST['publishing_house']),
    "manga_authors" => htmlspecialchars($_POST['authors']),
    "manga_volumes" => isset($_POST['volumes']) ? strval(htmlspecialchars($_POST['volumes'])) : null
];

if (Form::check($datas)) {
    $manga = (new MangaForm($datas))->createManga();
    $name_file = "manga_picture";
    $uploadfile = $uploaddir . basename($_FILES[$name_file]['name']);

    if (isset($_POST['submit'])) {
        $manga->sendDatabase();

        // recupere le dernier enregistrement
        $last_manga = (array) Database::getDatabase()->query("SELECT * FROM manga ORDER BY id_manga DESC")[0];

        $manga->setIdWork($last_manga['id_manga']);

        Form::upload_file($name_file, $allowed, $uploadfile);
        rename(
            "$_SERVER[DOCUMENT_ROOT]/assets/img/manga/" . $_FILES[$name_file]['name'],
            "$_SERVER[DOCUMENT_ROOT]/assets/img/manga/" . $manga->getIdWork() . ".jpg"
        );
    }

    if (isset($_POST['preview'])) {
        Form::upload_file($name_file, $allowed, $uploadfile);
        rename(
            "$_SERVER[DOCUMENT_ROOT]/assets/img/manga/" . $_FILES[$name_file]['name'],
            "$_SERVER[DOCUMENT_ROOT]$preview_path_replace"
        );
    }
} else $error = "Veuillez remplir tous les champs";
