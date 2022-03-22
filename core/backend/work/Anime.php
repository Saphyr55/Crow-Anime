<?php

class Anime extends Work
{    
    private $season;
    private $number_season;
    private $current_season;

    public function __construct(string $title_en, string $title_ja, float $score, 
                DateTime $date_sorted, bool $finish, string $sysnopis,
                Season $season, int $number_season, int $current_season)
    {
        parent::__construct($title_en, $title_ja, $score, $date_sorted, $finish,$sysnopis);
        $this->season = $season;
        $this->number_season = $number_season;
        $this->current_season = $current_season;
    }
    
    public function loading_anime() 
    {
         
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
     * @return  self
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
