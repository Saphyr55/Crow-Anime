<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Character;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Database\Database;
use CrowAnime\Router\Router;
use CrowAnime\Core\Language\Language;

class ProfileMangaController extends Controller{

    private ?Manga $manga;

    public function action (): void{

        $this->language(Language::getLanguage()->for('profile_manga'));

        $this->manga = Manga::getCurrentMangaURI();

        $members = Database::getDatabase()->execute(
            "SELECT Count(id_user) FROM lister_manga 
            WHERE id_manga=:id_manga",
            [":id_manga"=>$this->manga->getIdWork()])[0]["Count(id_user)"];
        
        $this->submitForm();    
            
        $this->with([
            "current_manga" => $this->manga,
            "members" => $members,
            "currentUserExist" =>$_SESSION['user']!=null,
            "isInList" => $this->isInList(),
            "score" => $this->getScore()===null? 5 : $this->getScore(),
            "characters" => $this->getCharacters(),
        ]);
    }

    public function getScore(): int|string|null {
        if($_SESSION['user']!=null){
            $data = Database::getDatabase()->execute(
                "SELECT score FROM lister_manga
                WHERE id_manga=:id_manga and id_user=:id_user
                ",
                [
                    ":id_manga"=>$this->manga->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser()
                ]
            );
            return $data[0]['score'];
        }
        return null;
    }

    public function isInList(): bool{
        if($_SESSION['user']!==null){
            $data = Database::getDatabase()->execute(
                "SELECT * FROM lister_manga
                WHERE id_manga=:id_manga and id_user=:id_user",
                [
                    ":id_manga"=>$this->manga->getIdWork(),
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
        if($_SESSION['user']!==null){
            Database::getDatabase()->execute(
                "INSERT INTO lister_manga(id_manga, id_user, add_date, score)
                VALUES(:id_manga, :id_user, :add_date, :score)",
                [
                    ":id_manga"=>$this->manga->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser(),
                    ":add_date"=>date("Y-m-d"),
                    "score"=> $score,
                ]
                );
        }
    }

    public function deleteInList(): void{
        if($_SESSION['user']!==null){
            Database::getDatabase()->execute(
               "DELETE FROM lister_manga
               WHERE id_user = :id_user and id_manga=:id_manga",
                [
                    ":id_manga"=>$this->manga->getIdWork(),
                    ":id_user"=>$_SESSION['user']->getIdUser(),
                ]
                );
        }
    }

    public function changeScore($score): void{
        if($_SESSION['user']!==null){
            Database::getDatabase()->execute(
                "UPDATE lister_manga
                SET score = :score
                WHERE id_user = :id_user and id_manga=:id_manga",
                [
                    ":id_manga"=>$this->manga->getIdWork(),
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
            INNER JOIN participer_manga p on _character.id_character = p.id_character
            WHERE id_manga=:id_manga LIMIT 10",
            [
                ":id_manga"=>$this->manga->getIdWork(),
            ]
        );
        foreach ($data as $chara)
            $characters[] = Character::convert($chara);

        return $characters;
    }


    public function submitForm(): void{
        if(isset($_POST['button_add'])){
            $this->addInList();
            Router::redirect("manga/".Manga::getCurrentMangaURI()->getIdWork());
        }
        if(isset($_POST['button_delete'])){
            $this->deleteInList();
            Router::redirect("manga/".Manga::getCurrentMangaURI()->getIdWork());
        }
        if(isset($_POST['note_submit'])){
            if($this->isInList()){
                $this->changeScore(intval($_POST['note_value']));
            }
            else{
                $this->addInList($_POST['note_value']);
            }
            Router::redirect("manga/".Manga::getCurrentMangaURI()->getIdWork());
        }
    }
}