<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Controllers\Controller;
use CrowAnime\Core\Entities\Character;
use CrowAnime\Core\Language\Language;

class ProfileCharacterController extends Controller
{

    public function action(): void
    {
        $Character = Character::getCurrentCharacterURI();
        $this->language(Language::getLanguage()->for("profile_character"));
        $this->with(
            [
                'NameCharacter' => $Character->getName(),
                'IdCharacter' => $Character->getCharacterId(),
                'PathImageCharacter' => $Character->getPathImage(),
                'DescriptionCharacter' => $Character->getDescription()
            ]);
    }
}