<?php

namespace CrowAnime\Core\Forms\Entities;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\Character;
use CrowAnime\Core\Forms\Form;

class CharacterForm extends \CrowAnime\Core\Forms\Form
{
    private string $errorMsg = "";

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function getCharacter(): ?Character
    {
        $allowed = ['jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'png' => 'image/png'];
        $upload_dir = getcwd() . DIRECTORY_SEPARATOR . '/assets/img/characters/';
        $name_file = 'character_picture';
        return $this->checkData($this->recoverDataForm(), $name_file, $allowed, $upload_dir);
    }

    private function checkData($data, $name_file, $allowed, $upload_dir): ?Character
    {
        if (isset($_POST['name_character']) && !empty($_POST['name_character']) && isset($_POST['character_description']) && !empty($_POST['character_description']))
        {
            $self = new CharacterForm($data);
            $character = $self->createCharacter();
            $upload_file = $upload_dir . basename($_FILES[$name_file]['name']);
            $self->issetSubmit($character, $name_file, $allowed, $upload_file);
            return $character;
        }
        else
            $this->errorMsg = 'Veulliez remplir tous les champs';
        return null;
    }

    private function createCharacter(): Character
    {
        return new Character(
            $this->data['name_character'],
            $this->data['character_description']
        );
    }

    private function recoverDataForm(): array
    {
        return
            [
                'name_character' => htmlspecialchars($_POST['name_character']),
                'character_description' => htmlspecialchars($_POST['character_description'])
            ];
    }

    private function issetSubmit(Character $character, $name_file, $allowed, $upload_file)
    {
        $character->sendDatabase();
        $last_character= (array)Database::getDatabase()->query("SELECT * FROM _character ORDER BY id_character DESC LIMIT 1")[0];
        $character->setCharacterId($last_character['id_character']);
        $character->setPathImage('/assets/img/characters/' . $character->getCharacterId() . '.jpg');
        Form::upload_file($name_file, $allowed, $upload_file);
        rename($_SERVER['DOCUMENT_ROOT'].'/assets/img/characters/' . $_FILES[$name_file]['name'], "$_SERVER[DOCUMENT_ROOT]/assets/img/characters/" . $character->getCharacterId() . '.jpg');
    }

    /**
     * @return string
     */
    public function getErrorMsg(): string
    {
        return $this->errorMsg;
    }

    /**
     * @param string $errorMsg
     */
    public function setErrorMsg(string $errorMsg): void
    {
        $this->errorMsg = $errorMsg;
    }



}