<?php

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Form\Form;
use CrowAnime\Backend\Work\AnimeForm;
use CrowAnime\Backend\Work\Season; 


$data = [
    "anime_title_en" => htmlspecialchars($_POST['title_en']),
    "anime_title_ja" => htmlspecialchars($_POST['title_ja']),
    "anime_season" => htmlspecialchars($_POST['season_anime']),
    "anime_date" => htmlspecialchars($_POST['date']),
    "anime_studio" => htmlspecialchars($_POST['studio']),
    "anime_finish" => (htmlspecialchars($_POST['finish']) === "on") ? true : false
];
$form = (Form::check($data) ? new AnimeForm($data) : null);
if (isset($isset)) { 
    var_dump("Salut");
    $dataDB = Database::getDatabase()->nLastRegister('anime', 'id_anime', 1); // recupere le dernier enregistrement
    var_dump($dataDB);
    /*$id_anime = intval(((array) $dataDB[0])['id_anime']); // recupere id du dernier enregistrement
    $anime->setIdWork($id_anime);
    $name_work = ((array) $dataDB[0])['anime_title_en'];
    $data_json = json_encode(array(
        "id_work" => $id_anime, 
        "name_work" => $name_work,
        "is_anime" => true,
        "is_manga" => false
    ));
    $file_json = fopen($_SERVER['DOCUMENT_ROOT'] . "/assets/data/work.json", "w")
        or die("Unable to open file!");
    fwrite($file_json, $data_json);
    fclose($file_json);

    $command_py = escapeshellcmd("python3 " . $_SERVER['DOCUMENT_ROOT'] . "/app/python/script.py");
    shell_exec($command_py);*/
}
?>

<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src=<?= ($anime !== null) ? $anime->getUrlImageWork54x71() : "/assets/img/not_found.png" ?>>
    </div>
    <div class="form">
        <form action="" method="POST">
            <input type="text" name="title_en" placeholder="Nom de l'anime anglais" ><br>
            <input type="text" name="title_ja" placeholder="Nom de l'anime japonais" ><br>
            <div class="year-season">
                <label>Année :</label>
                <input name="date" type="date" />
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
                <input type="text" name="studio" id="">
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
                <input type="checkbox" name="finish" id="is_finish_anime" >
                <label for="finish">Est-il fini ?</label>
            </div>
            <br>
            <div>
                <button class="preview-anime" type="submit">Apercu de l'anime</button>
                <br>
                <button class="submit-button" type="submit" name="submit">Enregistrer l'anime</button>
            </div>
            
        </form>
    </div>
</section>