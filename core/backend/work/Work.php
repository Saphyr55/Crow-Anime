<?php

abstract class Work 
{
    private $title_en;
    private $title_ja;
    private $realese_date;
    private $is_finish;
    private $sysnopis;
    private $score;
    
    public function __construct (
        string $title_en = "not defined", string $title_ja = "not defined", float $score = 0.0, 
        DateTime $realese_date, bool $is_finish = false, string $sysnopis = "") 
    {
        $this->title_en = $title_en;
        $this->title_ja = $title_ja;
        $this->realese_date = $realese_date;
        $this->is_finish = $is_finish;
        $this->sysnopis = $sysnopis;
        $this->score = $score;
    }

    /**
     * Get the value of realese_date
     */ 
    public function getrealese_date()
    {
        return $this->realese_date;
    }

    /**
     * Set the value of realese_date
     *
     * @return  self
     */ 
    public function setrealese_date($realese_date)
    {
        $this->realese_date = $realese_date;

        return $this;
    }

    /**
     * Get the value of finish
     */ 
    public function getFinish()
    {
        return $this->is_finish;
    }

    /**
     * Set the value of finish
     *
     * @return  self
     */ 
    public function setFinish($is_finish)
    {
        $this->is_finish = $is_finish;

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
        if ($this instanceof Anime) 
        {
           //requete sql  
        }
        elseif($this instanceof Manga)
        {
           //requete sql
        }
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
        if ($this instanceof Anime) 
        {
           //requete sql  
        }
        elseif($this instanceof Manga)
        {
           //requete sql
        }
        $this->score = $score;
        return $this;
    }

    /**
     * Get the value of title_ja
     */ 
    public function getTitle_ja()
    {
        return $this->title_ja;
    }

    /**
     * Set the value of title_ja
     *
     * @return  self
     */ 
    public function setTitle_ja($title_ja)
    {
        $this->title_ja = $title_ja;

        return $this;
    }

    /**
     * Get the value of title_en
     */ 
    public function getTitle_en()
    {
        return $this->title_en;
    }

    /**
     * Set the value of title_en
     *
     * @return  self
     */ 
    public function setTitle_en($title_en)
    {
        $this->title_en = $title_en;

        return $this;
    }
}