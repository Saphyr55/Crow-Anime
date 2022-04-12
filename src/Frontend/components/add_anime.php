<?php

use CrowAnime\Backend\Database;
use CrowAnime\Backend\Work\Anime;
use CrowAnime\Backend\Work\Season; 

/**
$title_en     =  htmlentities(htmlspecialchars($_POST['name_anime_en']));
$title_ja     =  htmlentities(htmlspecialchars($_POST['name_anime_ja']));
if (!isset($_POST['is_finish_anime']))
    $is_finish = 0;
else
    $is_finish  =  boolval($_POST['is_finish_anime']);
$season_anime   =  htmlspecialchars(htmlentities($_POST['season_anime']));
$synopsis_anime = htmlspecialchars(htmlentities($_POST["synopsis_anime"]));

if (
    isset($title_en) and isset($title_ja) and
    isset($is_finish) and isset($season_anime) and
    isset($synopsis_anime)
) {

    $anime = Anime::build(
        $title_en,
        $title_ja,
        $is_finish, # construction de l'anime
        $synopsis_anime,
        $season_anime
    );
    $anime->put_in_database(); # envoi l'objet dans la database

    $data = Database::getDatabase()->lastRegister('anime', 'id_anime'); // recupere le dernier enregistrement
    $id_anime = intval(((array) $data[0])['id_anime']); // recupere id du dernier enregistrement
    $anime->setIdWork($id_anime);
    $name_work = ((array) $data[0])['anime_title_en'];
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
    shell_exec($command_py);
}

*/
?>

<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src=<?= ($anime !== null) ? $anime->getUrlImageWork54x71() : "/assets/img/not_found.png" ?>>
    </div>
    <div class="form">
        <form action="" method="post">
            <input type="text" name="name_anime_en" value="" placeholder="Nom de l'anime anglais"><br>
            <input type="text" name="name_anime_ja" placeholder="Nom de l'anime japonais"><br>
            <span>
                <label for="year">Année :</label>
                <select id="year" name="year">
                    <?php
                    for ($i = 1990; $i <= date('Y'); $i++) {
                        echo "<option value=\"date_$i\" >$i</option>";
                    }
                    ?>
                </select>
                <select name="season_anime" id="">
                    <option value="<?= Season::SPRING ?>">Spring</option>
                    <option value="<?= Season::SUMMER ?>">Summer</option>
                    <option value="<?= Season::FALL ?>">Fall</option>
                    <option value="<?= Season::WINTER ?>">Winter</option>
                </select>
            </span>
            <br>
            <label for="is_finish_anime">Est-il fini ?</label>
            <input type="checkbox" name="is_finish_anime" id="is_finish_anime">
            <br>
            <textarea name="synopsis" id="" cols="30" rows="10"></textarea>
            <button type="submit" name="submit">Enregistrer l'anime</button>
        </form>
    </div>
</section>