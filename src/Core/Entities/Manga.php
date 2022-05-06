<?php

namespace CrowAnime\Core\Entities;

use CrowAnime\Core\Database\Database;
use DateTime;

class Manga extends Work
{

    private static array $recentMangasUpload = [];
    private static array $topMangas = [];
    private static array $mostPopularMangas = [];
    private static ?Manga $currentMangaURI = null;
    private ?string $authors, $publishingHouse;
    private int|null|string $volumes;

    public function __construct(
        ?string              $title_en = '',
        ?string              $title_ja = '',
        ?bool                $is_finish = false,
        ?string              $synopsis = '',
        string|null          $authors = null,
        string|null          $publishingHouse = null,
        int|null|string      $volumes = null,
        DateTime|string|null $date = null
    )
    {
        parent::__construct($title_en, $title_ja, $is_finish, $synopsis, $date);
        $this->volumes = $volumes;
        $this->authors = $authors;
        $this->publishingHouse = $publishingHouse;
    }

    public static function convertMangaDBtoObjectManga(array $manga): ?Manga
    {
        $mangaObject = null;
        if (!empty($manga)) {
            $mangaObject = new Manga(
                $manga['manga_title_en'],
                $manga['manga_title_ja'],
                $manga['manga_finish'],
                $manga['manga_synopsis'],
                $manga['manga_authors'],
                $manga['manga_edition'],
                $manga['manga_volumes'],
                $manga['manga_date']
            );
            $mangaObject
                ->setIdWork($manga['id_manga'])
                ->setScore(Database::getDatabase()->execute(
                    "SELECT AVG(l.score) FROM manga a 
                                INNER JOIN lister_manga l ON a.id_manga=l.id_manga
                                WHERE a.id_manga=:id_manga
                                ", [
                        ':id_manga' => $manga['id_manga']
                    ]
                )[0]["AVG(l.score)"]);
        }
        return $mangaObject;
    }

    public function sendDatabase()
    {
        Database::getDatabase()->execute(
            "INSERT INTO manga 
            (manga_title_ja, manga_title_en, manga_date, manga_finish,
             manga_author, manga_edition, manga_synopsis , manga_volumes)
            VALUES (:manga_title_ja, :manga_title_en, :manga_date, :manga_finish,
             :manga_author, :manga_edition, :manga_synopsis, :manga_volumes)",
            [
                ':manga_title_ja' => $this->getTitle_en(),
                ':manga_title_en' => $this->getTitle_ja(),
                ':manga_date' => $this->getDate(),
                ':manga_finish' => $this->isFinish() ? 1 : 0,
                ':manga_author' => $this->getAuthors(),
                ':manga_edition' => $this->getPublishingHouse(),
                ':manga_synopsis' => $this->getSynopsis(),
                ':manga_volumes' => $this->getVolumes()
            ]
        );
        $last_manga = Database::getDatabase()->execute("SELECT id_manga FROM manga ORDER BY id_manga DESC LIMIT 1")[0];
        Database::getDatabase()->execute("INSERT INTO lister_manga 
        (id_user, id_manga) VALUES (8, :id_manga)", [":id_manga"=>$last_manga['id_manga']]);
;    }

    public static function setMangaURI()
    {
        $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
        $work = explode('/',$uri);
        if (!strcmp($work[1], 'manga')) {

            $theoreticId = $work[2];

            $manga = Database::getDatabase()->execute(
                "SELECT * FROM manga WHERE id_manga=:id_manga", [':id_manga' => $theoreticId]
            )[0];

            if (!strcmp($theoreticId, $manga['id_manga'])) {
                if(isset($theoreticId) && isset($manga['id_manga'])){
                    self::setCurrentMangaURI(self::convertMangaDBtoObjectManga($manga));
                }
            }
        }
    }

    public static function setCurrentMangaURI(?Manga $manga)
    {
        self::$currentMangaURI = $manga;
    }

    public static function getCurrentMangaURI() : ?Manga
    {
        return self::$currentMangaURI;
    }

    public static function getMostPopularMangas(): array
    {
        if (self::$mostPopularMangas === []) {
            $mostPopularMangas = Database::getDatabase()->query(
                "SELECT m.*, COUNT(l.id_user) FROM manga m
                INNER JOIN lister_manga l ON m.id_manga=l.id_manga
                GROUP BY l.id_manga
                ORDER BY COUNT(l.id_user) DESC"
            );

            foreach ($mostPopularMangas as $value) {
                self::$mostPopularMangas[] = self::convertMangaDBtoObjectManga((array)$value);
            }
        }
        return self::$mostPopularMangas;
    }


    public static function getTopMangas(): array
    {
        if (self::$topMangas === []) {
            $topMangas = Database::getDatabase()->query(
                "SELECT *, AVG(score) FROM manga a
                INNER JOIN lister_manga l ON a.id_manga=l.id_manga
                GROUP BY l.id_manga
                ORDER BY score DESC"
            );

            foreach ($topMangas as $value) {
                self::$topMangas[] = self::convertMangaDBtoObjectManga((array)$value);
            }
        }
        return self::$topMangas;
    }


    public static function recentUpload(): array
    {
        if (self::$recentMangasUpload === []) {
            $recentMangasUpload = Database::getDatabase()->query(
                "SELECT * FROM manga ORDER BY id_manga DESC"
            );

            foreach ($recentMangasUpload as $value) {
                self::$recentMangasUpload[] = self::convertMangaDBtoObjectManga((array)$value);
            }
        }
        return self::$recentMangasUpload;
    }


    public function getAuthors(): ?string
    {
        return $this->authors;
    }

    public function setAuthors(?string $authors): self
    {
        $this->authors = $authors;
        return $this;
    }


    public function getPublishingHouse(): ?string
    {
        return $this->publishingHouse;
    }

    public function setPublishingHouse(?string $publishingHouse): self
    {
        $this->publishingHouse = $publishingHouse;
        return $this;
    }


    public function getVolumes(): int|null|string
    {
        return $this->volumes;
    }

    public function setVolumes(int|null|string $volumes): self
    {
        $this->volumes = $volumes;

        return $this;
    }

}
