<?php

namespace CrowAnime\Core\Forms;

use CrowAnime\Core\Entities\Manga;

class MangaForm extends Form
{

    public function __construct(array $data = [])
    {
        parent::__construct($data);
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

    public static function recoverDataForm(): array
    {
        return [
            "manga_title_ja" => htmlspecialchars($_POST['title_ja']),
            "manga_title_en" => htmlspecialchars($_POST['title_en']),
            "manga_date" => htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))),
            "manga_finish" => htmlspecialchars($_POST['finish']) === "on",
            "manga_publishing_house" => htmlspecialchars($_POST['publishing_house']),
            "manga_authors" => htmlspecialchars($_POST['authors']),
            "manga_volumes" => isset($_POST['volumes']) ? htmlspecialchars($_POST['volumes']) : null
        ];
    }
}
