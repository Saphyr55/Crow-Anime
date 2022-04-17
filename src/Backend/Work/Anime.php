<?php

namespace CrowAnime\Backend\Work;

use CrowAnime\Backend\Work\Work;
use CrowAnime\Backend\Database\Database;
use DateTime;

class Anime extends Work
{   
    private static array $recentAnimesUpload = [];
    private static array $animesCurrentSeason = [];
    private static array $topAnimes = [];
    private static array $mostPopularAnimes = [];
    private ?string $season;
    private ?string $studio;

    private function __construct(
        ?string $title_en = "",
        ?string $title_ja = "",
        ?bool $is_finish = false,
        ?string $synopsis = "",
        ?string $season = null,
        ?string $studio = "",
        DateTime|string|null $date = ""
    ) {
        parent::__construct($title_en, $title_ja, $is_finish, $synopsis, $date);
        $this->season = $season;
        $this->studio = $studio;
    }

    public static function build(
        string $title_en = "",
        string $title_ja = "",
        bool $is_finish = false,
        string $synopsis = "",
        string $season = null,
        string $studio,
        DateTime|string $date
    ) {
        $instance = new Anime(
            $title_en,
            $title_ja,
            $is_finish,
            $synopsis,
            $season,
            $studio,
            $date
        );
        return $instance;
    }

    public function sendDatabase()
    {
        Database::getDatabase()->execute(
            "INSERT INTO anime 
            (anime_title_en, anime_title_ja, anime_finish, anime_season,
             anime_synopsis, anime_studio, anime_date)
            VALUES (:anime_title_en, :anime_title_ja, :anime_finish, :anime_season,
             :anime_synopsis, :anime_studio, :anime_date)",
            [
                ':anime_title_en'  => $this->getTitle_en(),
                ':anime_title_ja'  => $this->getTitle_ja(),
                ':anime_finish'    => $this->isFinish() ? 1 : 0,
                ':anime_season'    => $this->getSeason(),
                ':anime_synopsis'  => $this->getSysnopis(),
                ':anime_studio'    => $this->getStudio(),
                ':anime_date'      => $this->getDate()
            ]
        );
    }

    public static function getAnimesOfCurrentSeason(): array
    {
        if (self::$animesCurrentSeason === []) {
            $animesCurrentSeason = Database::getDatabase()->execute(
                "SELECT * FROM anime
                WHERE anime_season=:anime_season
                AND strftime('%Y', anime_date)=:anime_date",
                [
                    ':anime_season' => Season::getCurrentSeason(),
                    ':anime_date' => date('Y')
                ]
            );
            foreach ($animesCurrentSeason as $value) {
                $anime = Anime::build(
                    $value['anime_title_en'],
                    $value['anime_title_ja'],
                    $value['anime_finish'],
                    $value['anime_synopsis'],
                    $value['anime_season'],
                    $value['anime_studio'],
                    $value['anime_date'],
                );
                $anime->setIdWork($value['id_anime']);
                array_push(self::$animesCurrentSeason, $anime);
            }
        }
        return self::$animesCurrentSeason;
    }

    public static function getMostPopularAnimes(): array
    {
        if (self::$mostPopularAnimes === []) {
            $mostPopularAnimes = Database::getDatabase()->query(
                "SELECT a.*, COUNT(l.id_user) FROM anime a
                INNER JOIN lister_anime l ON a.id_anime=l.id_anime
                GROUP BY l.id_anime
                ORDER BY COUNT(l.id_user) DESC"
            );

            foreach ($mostPopularAnimes as $value) {
                $value = (array) $value;
                $anime = Anime::build(
                    $value['anime_title_en'],
                    $value['anime_title_ja'],
                    $value['anime_finish'],
                    $value['anime_synopsis'],
                    $value['anime_season'],
                    $value['anime_studio'],
                    $value['anime_date'],
                );
                $anime->setIdWork($value['id_anime']);
                $anime->setScore($value['COUNT(id_user)']);
                array_push(self::$mostPopularAnimes, $anime);
            }
        }
        return self::$mostPopularAnimes;
    }

    public static function getTopAnimes(): array
    {
        if (self::$topAnimes === []) {
            $topAnimes = Database::getDatabase()->query(
                "SELECT *, AVG(score) FROM anime a
                INNER JOIN lister_anime l ON a.id_anime=l.id_anime
                GROUP BY l.id_anime
                ORDER BY score DESC"
            );

            foreach ($topAnimes as $value) {
                $value = (array) $value;
                $anime = Anime::build(
                    $value['anime_title_en'],
                    $value['anime_title_ja'],
                    $value['anime_finish'],
                    $value['anime_synopsis'],
                    $value['anime_season'],
                    $value['anime_studio'],
                    $value['anime_date'],
                );
                $anime->setIdWork($value['id_anime']);
                $anime->setScore($value['AVG(score)']);
                array_push(self::$topAnimes, $anime);
            }
        }
        return self::$topAnimes;
    }

    public static function recentAnimesUpload()
    {   
        if (self::$recentAnimesUpload === []) {
            $recentAnimesUpload = Database::getDatabase()->query(
                "SELECT * FROM anime ORDER BY id_anime DESC"
            );

            foreach ($recentAnimesUpload as $value) {
                $value = (array) $value;
                $anime = Anime::build(
                    $value['anime_title_en'],
                    $value['anime_title_ja'],
                    $value['anime_finish'],
                    $value['anime_synopsis'],
                    $value['anime_season'],
                    $value['anime_studio'],
                    $value['anime_date'],
                );

                $anime->setIdWork($value['id_anime']);
                array_push(self::$recentAnimesUpload, $anime);
            }
        }
        return self::$recentAnimesUpload;
    }

    /**
     * Get the value of number_season
     */
    public function getNumberSeason()
    {
        return $this->number_season;
    }

    /**
     * Set the value of number_season
     *
     * @return self
     */
    public function setNumberSeason($number_season)
    {
        $this->number_season = $number_season;

        return $this;
    }

    /**
     * Get the value of season
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set the value of season
     *
     * @return  self
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get the value of current_season
     */
    public function getCurrentSeason()
    {
        return $this->current_season;
    }

    /**
     * Set the value of current_season
     *
     * @return  self
     */
    public function setCurrentSeason($current_season)
    {
        $this->current_season = $current_season;

        return $this;
    }

    /**
     * Get the value of studio
     */
    public function getStudio()
    {
        return $this->studio;
    }

    /**
     * Set the value of studio
     *
     * @return  self
     */
    public function setStudio($studio)
    {
        $this->studio = $studio;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
