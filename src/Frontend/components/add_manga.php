<?php

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Form\Form;
use CrowAnime\Backend\User;
use CrowAnime\Backend\Work\MangaForm;


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
?>

<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src="<?php
                                    if (isset($_POST['submit'])) echo "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $manga->getIdWork() . '.jpg';
                                    else if (isset($_POST['preview'])) echo "http://$_SERVER[HTTP_HOST]$preview_path_replace";
                                    else echo "http://$_SERVER[HTTP_HOST]/assets/img/not_found.png";
                                    ?>">
    </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title_en" placeholder="Nom du manga anglais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_en']) ?>"><br>
            <input type="text" name="title_ja" placeholder="Nom du manga japonais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_ja']) ?>"><br>
            <div class="year-season">
                <label>Année :</label>
                <input name="date" type="date" value="<?php if ($manage_bool) echo htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))) ?>" />
            </div>
            <br>
            <div>
                <input class="input-pa" type="text" name="publishing_house" id="" placeholder="Publishing house" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['publishing_house']) ?>">
                <input class="input-pa" type="text" name="authors" id="" placeholder="Authors" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['authors']) ?>">
            </div>
            <br>
            <div class="choose-picture">
                <label>Choose a anime picture : </label><br>
                <label>Auto</label>
                <input type="checkbox" onchange="document.getElementById('anime-picture').disabled = this.checked;" name="auto_picture" id="auto-picture">
                <input type="file" id="anime-picture" name="manga_picture" accept="image/png, image/jpeg">
                <br>
            </div>
            <div>
                <label for="finish">Est-il fini ?</label>
                <input type="checkbox" name="finish" id="is_finish_anime"><br>
                <label for="volumes">Nombres de volumes</label>
                <input type="checkbox" name="unknow_volumes" onchange="document.getElementById('volumes').disabled = this.checked;" id="">
                <input type="number" name="volumes" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['volumes']) ?>" id="volumes">
            </div>
            <br>
            <div>
                <button class="preview-anime" type="submit" name="preview">Apercu du manga</button>
                <br>
                <button class="submit-button" type="submit" name="submit">Enregistrer du manga</button>
            </div>

        </form>
    </div>
</section>