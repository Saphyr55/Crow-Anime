<?php

use CrowAnime\Database\Database;
use CrowAnime\Form\Form;
use CrowAnime\Core\User;
use CrowAnime\Form\AnimeForm;

$path_replace = "/assets/img/anime/preview_" . User::getCurrentUser()->getIdUser() . ".jpg";
if (file_exists("$_SERVER[DOCUMENT_ROOT]$path_replace"))
    unlink("$_SERVER[DOCUMENT_ROOT]$path_replace");

$manage_bool = isset($_POST['submit']) || isset($_POST['preview']);
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
$uploaddir = getcwd() . DIRECTORY_SEPARATOR . '/assets/img/anime/';
$datas =
    [
        "anime_title_en" => htmlspecialchars($_POST['title_en']),
        "anime_title_ja" => htmlspecialchars($_POST['title_ja']),
        "anime_season" => htmlspecialchars($_POST['season_anime']),
        "anime_date" => htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))),
        "anime_studio" => htmlspecialchars($_POST['studio']),
        "anime_finish" => (htmlspecialchars($_POST['finish']) === "on") ? true : false
    ];

if (Form::check($datas)) {

    $anime = (new AnimeForm($datas))->createAnime();

    $name_file = "anime_picture";
    $uploadfile = $uploaddir . basename($_FILES['anime_picture']['name']);

    if (isset($_POST['submit'])) {
        $anime->sendDatabase();

        // recupere le dernier enregistrement
        $last_anime = (array) Database::getDatabase()->query("SELECT * FROM anime ORDER BY id_anime DESC")[0];

        $anime->setIdWork($last_anime['id_anime']);

        Form::upload_file($name_file, $allowed, $uploadfile);
        rename(
            "$_SERVER[DOCUMENT_ROOT]/assets/img/anime/" . $_FILES[$name_file]['name'],
            "$_SERVER[DOCUMENT_ROOT]/assets/img/anime/" . $anime->getIdWork() . ".jpg"
        );
    }

    if (isset($_POST['preview'])) {
        Form::upload_file($name_file, $allowed, $uploadfile);
        rename(
            "$_SERVER[DOCUMENT_ROOT]/assets/img/anime/" . $_FILES[$name_file]['name'],
            "$_SERVER[DOCUMENT_ROOT]$path_replace"
        );
    }
} else $error = "Veuillez remplir tous les champs";