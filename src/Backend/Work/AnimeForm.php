<?php
namespace CrowAnime\Backend\Work;

use CrowAnime\Backend\Form\Form;
use CrowAnime\Backend\Work\Anime;

class AnimeForm extends Form 
{
    public function __construct(array $data = []) 
    {
        parent::__construct($data);
        $this->data = $data;
        $this->data['anime_synopsis'] = "";
        $this->data['anime_score'] = null; 
    }

    public function createAnime() : Anime
    {   
        return Anime::build(
            $this->data['anime_title_en'],
            $this->data['anime_title_ja'],
            $this->data['anime_finish'],
            $this->data['anime_synopsis'],
            $this->data['anime_season'],
            $this->data['anime_studio'],
            $this->data['anime_date']
        );
    }

}