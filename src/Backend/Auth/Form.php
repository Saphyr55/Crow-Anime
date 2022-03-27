<?php

namespace CrowAnime\Backend\Auth;

use CrowAnime\Backend\Database;
use CrowAnime\Backend\User;
use CrowAnime\Backend\Work\Anime;
use DateTime;

/**
 * 
 */

class Form
{

    public static function register()
    {
    }

    public static function addAnime()
    {
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
            #->put_in_database(); # envoi l'objet dans la database

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

            return $anime;
        }
    }
}
