<?php
namespace CrowAnime\Backend\Work;

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Form\Form;

class AnimeForm extends Form 
{
    public function __construct(array $data) 
    {
        parent::__construct($data);
        $this->data['anime_synopsis'] = "";
        $this->data['anime_score'] = null; 
    }

    public function sendDatabase()
    {
        $data = $this->data;
        Database::getDatabase()->execute(
            "INSERT INTO anime VALUES (?,?,?,?,?,?,?,?)", 
             [
                $data['anime_title_en'],
                $data['anime_title_ja'],
                $data['anime_finish'],
                $data['anime_season'],
                $data['anime_synopsis'],
                $data['anime_studio'],
                $data['anime_score'],
                $data['anime_date']
            ]
        );
    }
}