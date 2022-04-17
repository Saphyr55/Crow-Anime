<?php

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Form\Form;
use CrowAnime\Backend\User;
use CrowAnime\Backend\Work\AnimeForm;
use CrowAnime\Backend\Work\Season;


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
?>

<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src="<?php
                                if (isset($_POST['submit'])) echo "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $anime->getIdWork() . '.jpg';
                                else if (isset($_POST['preview'])) echo "http://$_SERVER[HTTP_HOST]$path_replace";
                                else echo "http://$_SERVER[HTTP_HOST]/assets/img/not_found.png";
                                ?>"> 
        </div>
        <div class="form">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" name="title_en" placeholder="Nom de l'anime anglais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_en']) ?>"><br>
                <input type="text" name="title_ja" placeholder="Nom de l'anime japonais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_ja']) ?>"><br>
                <div class="year-season">
                    <label>Année :</label>
                    <input name="date" type="date" value="<?php if ($manage_bool) echo htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))) ?>" />
                    <select name="season_anime" id="">
                        <option value="<?= Season::SPRING ?>">Spring</option>
                        <option value="<?= Season::SUMMER ?>">Summer</option>
                        <option value="<?= Season::FALL ?>">Fall</option>
                        <option value="<?= Season::WINTER ?>">Winter</option>
                    </select>
                </div>
                <br>
                <div>
                    <label for="">Studio : </label>
                    <input type="text" name="studio" id="" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['studio']) ?>">
                </div>
                <br>
                <div class="choose-picture">
                    <label>Choose a anime picture : </label><br>
                    <label>Auto</label>
                    <input type="checkbox" onchange="document.getElementById('anime-picture').disabled = this.checked;" name="auto_picture" id="auto-picture">
                    <input type="file" id="anime-picture" name="anime_picture" accept="image/png, image/jpeg">
                    <br>
                </div>
                <div>
                    <input type="checkbox" name="finish" id="is_finish_anime">
                    <label for="finish">Est-il fini ?</label>
                </div>
                <br>
                <div>
                    <button class="preview-anime" type="submit" name="preview">Apercu de l'anime</button>
                    <br>
                    <button class="submit-button" type="submit" name="submit">Enregistrer l'anime</button>
                </div>

            </form>
        </div>
</section>