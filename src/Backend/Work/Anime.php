<?php

namespace CrowAnime\Backend\Work;

use CrowAnime\Backend\Work\Work;
use CrowAnime\Backend\Database\Database;
use DateTime;

class Anime extends Work
{    
    private $season;
    private $studio;
    private $date;

    private function __construct(
            string $title_en = "",
            string $title_ja = "",
            bool $is_finish = false,
            string $synopsis = "",
            string $season = null,
            string $studio,
            DateTime|string $date
    )
    {
        parent::__construct($title_en, $title_ja, $is_finish, $synopsis);
        $this->season = $season;
        $this->studio = $studio;
        $this->data = $date; 
    }

    public static function build(
        string $title_en = "", string $title_ja = "", bool $is_finish = false, string $synopsis = "",
        string $season = null, string $studio, DateTime|string $date
    )
    {
        $instance = new Anime(
            $title_en, 
            $title_ja,
            $is_finish, 
            $synopsis, 
            $season, 
            $studio, 
            $date);
        return $instance;
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