<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\Character;
use CrowAnime\Core\Sessions\Session;
use CrowAnime\Router\Router;
use CrowAnime\Core\Language\Language;

class ProfileAnimeController extends Controller{

    private ?Anime $anime;

    public function action (): void{

        $this->language(Language::getLanguage()->for('profile_anime'));

        $this->anime = Anime::getCurrentAnimeURI();

        $members = Database::getDatabase()->execute(
            "SELECT Count(id_user) FROM lister_anime 
            WHERE id_anime=:id_anime",
            [":id_anime"=>$this->anime->getIdWork()])[0]["Count(id_user)"];                                                    

        $this->submitForm();

        $this->with([
            "current_anime" => $this->anime,
            "members" => $members,
            "currentUserExist" =>$_SESSION['user']!=null,
            "isInList" => $this->isInList(),
            "score" => $this->getScore()===null ? 5 : $this->getScore(),
            "characters" => $this->getCharacters(),
        ]);

    }

    public function getScore(): int|string|null {
        if($_SESSION['user']!=null){
            $data = Database::getDatabase()->execute(
                "SELECT score FROM lister_anime
                WHERE id_anime=:id_anime and id_user=:id_user
                ",
                [
                    ":id_anime"=>$this->anime->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser()
                ]
            );
            return $data[0]['score'];
        }
        return null;
    }

    public function isInList(): bool{
        if($_SESSION['user']!=null){
            $data = Database::getDatabase()->execute(
                "SELECT * FROM lister_anime
                WHERE id_anime=:id_anime and id_user=:id_user",
                [
                    ":id_anime"=>$this->anime->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser()
                ]
            );
            if(!empty($data)){
                return true;
            }
        }
        return false;
    }
    
    public function addInList(int|string|null $score = null): void{
        if($_SESSION['user']!=null){
            Database::getDatabase()->execute(
                "INSERT INTO lister_anime(id_anime, id_user, add_date, score)
                VALUES(:id_anime, :id_user, :add_date, :score)",
                [
                    ":id_anime"=>$this->anime->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser(),
                    ":add_date"=>date("Y-m-d"),
                    "score"=> $score,
                ]
                );
        }
    }

    public function deleteInList(): void{
        if($_SESSION['user']!=null){
            Database::getDatabase()->execute(
               "DELETE FROM lister_anime
               WHERE id_user = :id_user and id_anime=:id_anime",
                [
                    ":id_anime"=>$this->anime->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser(),
                ]
                );
        }
    }

    public function changeScore($score): void{
        if($_SESSION['user']!=null){
            Database::getDatabase()->execute(
                "UPDATE lister_anime
                SET score = :score
                WHERE id_user = :id_user and id_anime=:id_anime",
                [
                    ":id_anime"=>$this->anime->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser(),
                    ":score"=>$score,
                ]
            );
        }
    }

    public function getCharacters(): array {
        $characters = [];
        $data = Database::getDatabase()->execute(
            "SELECT * FROM _character
            INNER JOIN participer_anime p on _character.id_character = p.id_character
            WHERE id_anime=:id_anime LIMIT 10",
            [
                ":id_anime"=>$this->anime->getIdWork(),
            ]
            );
            foreach ($data as $chara)
                $characters[] = Character::convert($chara);

        return $characters;
    }

    public function submitForm(): void{
        if(isset($_POST['button_add'])){
            $this->addInList();
            Router::redirect("anime/".Anime::getCurrentAnimeURI()->getIdWork());
        }
        if(isset($_POST['button_delete'])){
            $this->deleteInList();
            Router::redirect("anime/".Anime::getCurrentAnimeURI()->getIdWork());
        }
        if(isset($_POST['note_submit'])){
            if($this->isInList()){
                $this->changeScore(intval($_POST['note_value']));
            }
            else{
                $this->addInList($_POST['note_value']);
            }
            Router::redirect("anime/".Anime::getCurrentAnimeURI()->getIdWork());
        }
    }

}