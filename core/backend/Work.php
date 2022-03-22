<?php
abstract class Work {

    private $title_en;
    private $title_ja;
    private $date_sorted;
    private $finish;
    private $sysnopis;
    private $score;
    
    public function __construct(
        string $title_en, string $title_ja, float $score, 
        DateTime $date_sorted, bool $finish, string $sysnopis) {

        $this->title_en = $title_en;
        $this->title_ja = $title_ja;
        $this->date_sorted = $date_sorted;
        $this->finish = $finish;
        $this->sysnopis = $sysnopis;
        $this->score = $score;
    }

    public abstract function querry();

    public function getTitle(string $lang) {
        if ($lang === "en") {
            return $this->title_en;
        }
        elseif ($lang === "ja") {
            return $this->title_ja;
        }
        else {
            throw new Exception("Langue non supporter", 1);
        }
    }

    /**
     * Get the value of date_sorted
     */ 
    public function getDate_sorted()
    {
        return $this->date_sorted;
    }

    /**
     * Set the value of date_sorted
     *
     * @return  self
     */ 
    public function setDate_sorted($date_sorted)
    {
        $this->date_sorted = $date_sorted;

        return $this;
    }

    /**
     * Get the value of finish
     */ 
    public function getFinish()
    {
        return $this->finish;
    }

    /**
     * Set the value of finish
     *
     * @return  self
     */ 
    public function setFinish($finish)
    {
        $this->finish = $finish;

        return $this;
    }

    /**
     * Get the value of sysnopis
     */ 
    public function getSysnopis()
    {
        return $this->sysnopis;
    }

    /**
     * Set the value of sysnopis
     *
     * @return  self
     */ 
    public function setSysnopis($sysnopis)
    {
        $this->sysnopis = $sysnopis;

        return $this;
    }

    /**
     * Get the value of score
     */ 
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @return  self
     */ 
    public function setScore($score)
    {
        if ($this instanceof Anime) {
           //requete sql  
        }
        elseif($this instanceof Manga){
           //requete sql
        }
        $this->score = $score;
        return $this;
    }
}