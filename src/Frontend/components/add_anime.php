<?php

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Form\Form;
use CrowAnime\Backend\Work\Anime;
use CrowAnime\Backend\Work\AnimeForm;
use CrowAnime\Backend\Work\Season; 

$datas = [
    "anime_title_en" => htmlspecialchars($_POST['title_en']),
    "anime_title_ja" => htmlspecialchars($_POST['title_ja']),
    "anime_season" => htmlspecialchars($_POST['season_anime']),
    "anime_date" => htmlspecialchars($_POST['date']),
    "anime_studio" => htmlspecialchars($_POST['studio']),
    "anime_finish" => (htmlspecialchars($_POST['finish']) === "on" ) ? 1 : 0
];

if (Form::check($datas)) {
    $anime = (new AnimeForm($datas))->createAnime();
    if (isset($_POST['submit'])) {
        $anime->sendDatabase();
        // recupere le dernier enregistrement
        $last_anime = (array) Database::getDatabase()->query("SELECT * FROM anime ORDER BY id_anime DESC")[0]; 
    }
    
    var_dump($_FILES['anime_picture']);
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
    $uploaddir = getcwd().DIRECTORY_SEPARATOR;
    $uploadfile = $uploaddir . basename($_FILES['anime_picture']['name']);
    move_uploaded_file($_FILES['anime_picture']["tmp_name"], $uploadfile);
    
    //$da = "$last_anime[id_anime]_$last_anime[anime_title_en]"


/*
$id_anime = $last_anime['id_anime']; // recupere id du dernier enregistrement
$anime->setIdWork($id_anime);
$data_json = json_encode(array(
    "id_work" => $id_anime, 
    "name_work" => $last_anime['anime_title_en'],
    "is_anime" => true,
    "is_manga" => false
));
$file_json = fopen($_SERVER['DOCUMENT_ROOT'] . "/assets/data/work.json", "w") 
    or die("Unable to open file!");
fwrite($file_json, $data_json);
fclose($file_json);

$command_py = escapeshellcmd("python3 " . $_SERVER['DOCUMENT_ROOT'] . "/app/python/script.py");
shell_exec($command_py);
*/
}    

?>

<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src=<?= ($anime !== null) ? $anime->getUrlImageWork54x71() : "/assets/img/not_found.png" ?>>
    </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
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
                <button class="preview-anime" type="submit" name="preview">Apercu de l'anime</button>
                <br>
                <button class="submit-button" type="submit" name="submit">Enregistrer l'anime</button>
            </div>
            
        </form>
    </div>
</section>