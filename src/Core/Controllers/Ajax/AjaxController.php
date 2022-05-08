<?php

namespace CrowAnime\Core\Controllers\Ajax;

use CrowAnime\Core\Database\Database;

class AjaxController extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $this->profileAnime();
    }

    private function profileAnime()
    {
        if (isset($_GET['character'])) {

            $data = Database::getDatabase()->execute(
                "SELECT * FROM _character WHERE name_character LIKE :name_character",
                [
                    ':name_character' => "%$_GET[character]%"
                ]
            );
            if (!empty($data)) {
                foreach ($data as $charac)
                    echo "<button id='character_$charac[0]'>$charac[1]</button>";
            }
            else
                echo '<p>Aucun Resultat trouver</p>';
        }
    }

}