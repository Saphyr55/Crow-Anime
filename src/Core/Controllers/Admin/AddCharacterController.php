<?php

namespace CrowAnime\Core\Controllers\Admin;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Character;
use CrowAnime\Core\Forms\Entities\CharacterForm;

class AddCharacterController extends Controller
{

    public function action(): void
    {
        $form = new CharacterForm();
        $character = $form->getCharacter();
        $msg = $form->getErrorMsg();
        $this->with(
            [
                'url_image' => ($character!==null) ? $character->getPathImage() : '/assets/img/not_found.png',
                'error_msg' => $msg,
                'name_character' => htmlspecialchars($_POST['name_character']),
                'character_description' => htmlspecialchars($_POST['character_description'])
            ]
        );
    }
}