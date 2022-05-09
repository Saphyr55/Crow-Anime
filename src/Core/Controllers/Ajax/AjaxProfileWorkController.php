<?php

namespace CrowAnime\Core\Controllers\Ajax;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Character;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Entities\User;

class AjaxProfileWorkController extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $this->profileManga();
        $this->profileAnime();
        $this->admin();
    }

    private function admin()
    {
        if (isset($_GET['user']) && !!strcmp(' ',$_GET['user']) && !!strcmp('',$_GET['user'])) {
            $users = Database::getDatabase()->execute(
                "SELECT * FROM _user WHERE username LIKE :username AND id_user<>:id_user_current LIMIT 5", [
                    ':username' => "%$_GET[user]%",
                    ':id_user_current' => User::getCurrentUser()->getIdUser()
                ]
            );
            foreach ($users as $user) {
                if (!!strcmp('8',$user['id_user'])) {
                    if (!strcmp('0',$user['is_admin'])) $manage = "Set Admin";
                    else $manage = "Unset Admin";
                    echo "
                    <div>
                        <a href='/profile/$user[username]'>$user[username]</a>
                        <button id=\"button-suppr-user_$user[id_user]\" onclick=\"request_access(this)\">$manage</button>
                    </div>
                    ";
                }
            }
        }
        if (isset($_GET['user_id'])) {
            $user_id = explode('_', htmlspecialchars($_GET['user_id']))[1];
            $user = Database::getDatabase()->execute('SELECT * FROM _user WHERE id_user=:id_use',
                [':id_user' => $user_id])[0];
            Database::getDatabase()->execute(
                "UPDATE _user SET is_admin = :is_admin WHERE id_user=:id_user",[
                ':id_user'=> $user_id,
                ':is_admin' => !strcmp('0', $user['is_admin']) ? 1 : 0
            ]);
        }
    }

    private function profileAnime()
    {
        if(isset($_GET['character_id'])) {
            $character_id = explode('_', htmlspecialchars($_GET['character_id']))[1];
            $data = Database::getDatabase()->execute(
                "SELECT * FROM _character WHERE id_character=:id_character",
                [
                    ':id_character' => $character_id
                ]
            )[0];
            $character = Character::convert($data);

            $dataToCheck = Database::getDatabase()->execute(
                'SELECT * FROM participer_anime WHERE id_anime=:id_anime AND id_character=:id_character',
                [
                    ':id_character' => $character_id,
                    ':id_anime' => Anime::getCurrentAnimeURI()->getIdWork()
                ]
            );
            if (empty($dataToCheck))
                $character->addInAnime(Anime::getCurrentAnimeURI());
            else
                $character->deleteInAnime(Anime::getCurrentAnimeURI());

        }

        if (isset($_GET['character']) && !!strcmp('',$_GET['character'])) {

            $data = Database::getDatabase()->execute(
                "SELECT * FROM _character WHERE name_character LIKE :name_character LIMIT 10",
                [
                    ':name_character' => "%$_GET[character]%"
                ]
            );

            if (!empty($data)) {
                foreach ($data as $character){
                    $dataToCheck = Database::getDatabase()->execute(
                        'SELECT * FROM participer_anime WHERE id_anime=:id_anime AND id_character=:id_character LIMIT 1',
                        [
                            ':id_character' => $character[0],
                            ':id_anime' => Anime::getCurrentAnimeURI()->getIdWork()
                        ]
                    );
                    $manage = empty($dataToCheck) ? '+' : '-' ;
                    echo
                    "<button 
                        type='submit' 
                        onclick='request_access(this)' 
                        class='modal_button' 
                        name='character_$character[0]' 
                        id='character_$character[0]'>
                        $character[1] $manage
                    </button>";
                }
            }
            else
                echo '<p>Aucun Resultat trouver</p>';
        }
        else
            echo '';
    }

    private function profileManga()
    {
        if(isset($_GET['character_id_manga'])) {
            $character_id = explode('_', htmlspecialchars($_GET['character_id_manga']))[1];
            $data = Database::getDatabase()->execute(
                "SELECT * FROM _character WHERE id_character=:id_character",
                [
                    ':id_character' => $character_id
                ]
            )[0];
            $character = Character::convert($data);

            $dataToCheck = Database::getDatabase()->execute(
                'SELECT * FROM participer_manga WHERE id_manga=:id_manga AND id_character=:id_character',
                [
                    ':id_character' => $character_id,
                    ':id_manga' => Manga::getCurrentMangaURI()->getIdWork()
                ]
            );
            if (empty($dataToCheck))
                $character->addInManga(Manga::getCurrentMangaURI());
            else
                $character->deleteInManga(Manga::getCurrentMangaURI());

        }

        if (isset($_GET['character_manga']) && !!strcmp('',$_GET['character_manga'])) {

            $data = Database::getDatabase()->execute(
                "SELECT * FROM _character WHERE name_character LIKE :name_character LIMIT 10",
                [
                    ':name_character' => "%$_GET[character_manga]%"
                ]
            );

            if (!empty($data)) {
                foreach ($data as $character){
                    $dataToCheck = Database::getDatabase()->execute(
                        'SELECT * FROM participer_manga WHERE id_manga=:id_manga AND id_character=:id_character LIMIT 1',
                        [
                            ':id_character' => $character[0],
                            ':id_manga' => Manga::getCurrentMangaURI()->getIdWork()
                        ]
                    );
                    $manage = empty($dataToCheck) ? '+' : '-' ;
                    echo
                    "<button 
                        type='submit' 
                        onclick='request_access(this)' 
                        class='modal_button' 
                        name='character_$character[0]' 
                        id='character_$character[0]'>
                        $character[1] $manage
                    </button>";
                }
            }
            else
                echo '<p>Aucun Resultat trouver</p>';
        }
        else
            echo '';
    }

}