<?php

namespace CrowAnime\Core\Controllers\Components;

use CrowAnime\Core\Database\Database;
use CrowAnime\Core\Entities\Anime;
use CrowAnime\Core\Entities\Manga;
use CrowAnime\Core\Entities\User;

class SearchController extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $this->with([
            'animes' => $this->animes(),
            'mangas' => $this->mangas(),
            'profiles' => $this->profiles()
        ]);
    }

    private function profiles(): array
    {
        $profilesObject = [];
        $profiles = Database::getDatabase()->query(
            "SELECT * FROM _user WHERE username LIKE '%".$_GET['request']."%'"
        );
        foreach ($profiles as $profile)
            $profilesObject[] = User::arrayToUser((array)$profile);

        return $profilesObject;
    }

    private function animes(): array
    {
        $animesObject = [];
        $animes = Database::getDatabase()->query(
            "SELECT * FROM anime
                WHERE (anime_title_ja LIKE '%".$_GET['request']."%'
                OR anime_title_en LIKE '%".$_GET['request']."%')"
        );
        foreach ($animes as $anime)
            $animesObject[] = Anime::convertAnimeDBtoObjectAnime((array)$anime);

        return $animesObject;
    }

    private function mangas(): array
    {
        $mangasObject = [];
        $mangas = Database::getDatabase()->query(
            "SELECT * FROM manga
                WHERE (manga_title_ja LIKE '%".$_GET['request']."%'
                OR manga_title_en LIKE '%".$_GET['request']."%')"
        );
        foreach ($mangas as $manga)
            $mangasObject[] = Manga::convertMangaDBtoObjectManga( (array) $manga);

        return $mangasObject;
    }
}