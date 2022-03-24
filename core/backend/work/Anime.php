<?php
namespace Backend\Work;

require_once $_SERVER["DOCUMENT_ROOT"].'/core/backend/work/Work.php';

use Backend\Work\Work;
use Backend\Database;


class Anime extends Work
{    
    private $season;
    private $number_season;
    private $current_season;

    private function __construct(
            string $title_en = "", string $title_ja = "", bool $is_finish = false, string $synopsis = "",
            string $season = null, int $number_season = 1, int $current_season = 1)
    {
        parent::__construct($title_en, $title_ja, $is_finish, $synopsis);
        $this->season = $season;
        $this->number_season = $number_season;
        $this->current_season = $current_season;
    }

    public static function build(string $title_en = "", string $title_ja = "", bool $is_finish = false, string $synopsis = "",
                        string $season = null, int $number_season = 1, int $current_season = 1)
    {
        $instance = new Anime($title_en, $title_ja, $is_finish, $synopsis, $season, $number_season, $current_season);
        return $instance;
    }   
    
    public function put_in_database() 
    {
         Database::getDatabase()->execute(
            "INSERT INTO `anime` (
                anime_title_en,
                anime_title_ja,
                anime_season,
                anime_current_season,
                anime_number_season,
                anime_is_finish,
                anime_synopsis
            ) 
            VALUES ( ?,?,?,?,?,?,? )
            ", array(
                $this->title_en,
                $this->title_ja,
                $this->season,
                $this->current_season,
                $this->number_season,
                $this->is_finish,
                $this->synopsis
            )
        );
        return $this;
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
}