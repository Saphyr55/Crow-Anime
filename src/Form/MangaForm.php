<?php

namespace CrowAnime\Form;

use CrowAnime\Work\Manga;
use CrowAnime\Form\Form;

class MangaForm extends Form
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->data = $data;
        $this->data['anime_synopsis'] = "";
        $this->data['anime_score'] = null;
    }

    public function createManga(): Manga
    {
        return new Manga(
            $this->data['manga_title_en'],
            $this->data['manga_title_ja'],
            $this->data['manga_finish'],
            $this->data['manga_sysnopsis'],
            $this->data['manga_publishing_house'],
            $this->data['manga_authors'],
            $this->data['manga_volumes'],
            $this->data['manga_date'],
        );
    }
}
