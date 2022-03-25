<?php

namespace CrowAnime\Backend\Work;

require_once $_SERVER["DOCUMENT_ROOT"]."/core/backend/Database.php";

abstract class Work
{   
    public $idWork;
    protected $title_en;
    protected $title_ja;
    protected $is_finish;
    protected $synopsis;
    protected $score;
    protected $urlImageWork54x74;
    protected $urlImageWork225x316;

    public function __construct (
        string $title_en = "not defined", string $title_ja = "not defined",
        bool $is_finish = false, string $synopsis = "") 
    {   
        //$this->score = 0;
        $this->title_en = $title_en;
        $this->title_ja = $title_ja;
        $this->is_finish = $is_finish;
        $this->synopsis = $synopsis;
    }

    public function getUrlImageWork225x316()
    {
        if ($this->urlImageWork225x316 === null) {
            $urlImageWork225x316 = self::getImageUrl($this, "225x316");
            $this->urlImageWork225x316 = $urlImageWork225x316;
        }
        return $this->urlImageWork225x316;
    }

    public function getUrlImageWork54x71()
    {
        if ($this->urlImageWork54x74 === null) {
            $urlImageWork54x74 = self::getImageUrl($this, "54x74");
            $this->urlImageWork54x74 = $urlImageWork54x74;
        }
        return $this->urlImageWork54x74;
    }

    private static function getImageUrl(Work $work, string $format)
    {
        $file_url_image_anime = file_get_contents
        (
            $_SERVER["DOCUMENT_ROOT"].
            "/assets/img/".explode("\\",strtolower($work::class))[2]
            ."/$format"."/".$work->getIdWork().".json"
        );
        $json_url_image_anime = json_decode($file_url_image_anime);
        $url_image_anime = ((array)$json_url_image_anime)['url'];
        return $url_image_anime;
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
        return $this->synopsis;
    }

    /**
     * Set the value of sysnopis
     *
     * @return  self
     */ 
    public function setSysnopis($synopsis)
    {   
        if ($this instanceof Anime) 
        {
           //requete sql  
        }
        elseif($this instanceof Manga)
        {
           //requete sql
        }
        $this->synopsis = $synopsis;

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

    /**
     * Get the value of id_work
     */ 
    public function getIdWork()
    {
        return $this->idWork;
    }

    /**
     * Set the value of id_work
     *
     * @return  self
     */ 
    public function setIdWork($idWork)
    {
        $this->idWork = $idWork;
        return $this;
    }
}