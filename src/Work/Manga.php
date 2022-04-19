<?php

namespace CrowAnime\Work;

use CrowAnime\Database\Database;
use DateTime;

class Manga extends Work
{

    private static array $recentMangasUpload = [];
    private static array $topMangas = [];
    private static array $mostPopularMangas = [];
    private ?string $authors, $publishingHouse;
    private int $volumes;

    public function __construct(
        ?string $title_en = '',
        ?string $title_ja = '',
        ?bool $is_finish = false,
        ?string $synopsis = '',
        string|null $authors = null,
        string|null $publishingHouse = null,
        ?int $volumes = null,
        DateTime|string|null $date = null
    ) {
        parent::__construct($title_en, $title_ja, $is_finish, $synopsis, $date);
        $this->volumes = $volumes;
        $this->authors = $authors;
        $this->publishingHouse = $publishingHouse;
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
                ':manga_title_ja'  => $this->getTitle_en(),
                ':manga_title_en'  => $this->getTitle_ja(),
                ':manga_date'    => $this->getDate(),
                ':manga_finish'    => $this->isFinish() ? 1 : 0,
                ':manga_author'  => $this->getAuthors(),
                ':manga_edition'    => $this->getPublishingHouse(),
                ':manga_synopsis' => $this->getSysnopis(),
                ':manga_volumes'      => $this->getVolumes()
            ]
        );
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
                $value = (array) $value;
                $manga = new Manga(
                    $value['manga_title_ja'],
                    $value['manga_title_en'],
                    $value['manga_finish'],
                    $value['manga_synopsis'],
                    $value['manga_author'],
                    $value['manga_edition'],
                    $value['manga_volumes'],
                    $value['manga_date']
                );

                $manga->setIdWork($value['id_manga']);
                $manga->setScore($value['COUNT(id_user)']);
                array_push(self::$mostPopularMangas, $manga);
            }
        }
        return self::$mostPopularMangas;
    }

    public static function getTopAnimes(): array
    {
        if (self::$topMangas === []) {
            $topMangas = Database::getDatabase()->query(
                "SELECT *, AVG(score) FROM manga a
                INNER JOIN lister_manga l ON a.id_manga=l.id_manga
                GROUP BY l.id_manga
                ORDER BY score DESC"
            );

            foreach ($topMangas as $value) {
                $value = (array) $value;
                $manga = new Manga(
                    $value['manga_title_ja'],
                    $value['manga_title_en'],
                    $value['manga_finish'],
                    $value['manga_synopsis'],
                    $value['manga_author'],
                    $value['manga_edition'],
                    $value['manga_volumes'],
                    $value['manga_date']
                );

                $manga->setIdWork($value['id_manga']);
                $manga->setScore($value['AVG(score)']);
                array_push(self::$topMangas, $manga);
            }
        }
        return self::$topMangas;
    }

    public static function recentUpload()
    {
        if (self::$recentMangasUpload === []) {
            $recentMangasUpload = Database::getDatabase()->query(
                "SELECT * FROM manga ORDER BY id_manga DESC"
            );

            foreach ($recentMangasUpload as $value) {
                $value = (array) $value;
                $manga = new Manga(
                    $value['manga_title_ja'],
                    $value['manga_title_en'],
                    $value['manga_finish'],
                    $value['manga_synopsis'],
                    $value['manga_author'],
                    $value['manga_edition'],
                    $value['manga_volumes'],
                    $value['manga_date']
                );

                $manga->setIdWork($value['id_manga']);
                array_push(self::$recentMangasUpload, $manga);
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

    public function getVolumes(): int
    {
        return $this->volumes;
    }

    public function setVolumes(int $volumes): self
    {
        $this->volumes = $volumes;

        return $this;
    }
}
