<?php

namespace CrowAnime\Core\Entities;

use DateTime;

abstract class Work
{
    public int $idWork;
    protected ?string $title_en;
    protected ?string $title_ja;
    protected ?bool $is_finish;
    protected ?string $synopsis;
    protected mixed $score;
    protected string|null|DateTime $date;
    protected mixed $urlImageWork54x74;
    protected mixed $urlImageWork225x316;

    public function __construct(
        ?string $title_en,
        ?string $title_ja,
        ?bool $is_finish,
        ?string $synopsis,
        null|string|DateTime $date
    ) {
        //$this->score = 0;
        $this->title_en = $title_en;
        $this->title_ja = $title_ja;
        $this->is_finish = $is_finish;
        $this->synopsis = $synopsis;
        $this->date = $date;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    public function getUrlImageWork225x316()
//    {
//        if ($this->urlImageWork225x316 === null) {
//            $urlImageWork225x316 = self::getImageUrl($this, "225x316");
//            $this->urlImageWork225x316 = $urlImageWork225x316;
//        }
//        return $this->urlImageWork225x316;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


// --Commented out by Inspection START (20/04/2022 16:18):
//    public function getUrlImageWork54x71()
//    {
//        if ($this->urlImageWork54x74 === null) {
//            $urlImageWork54x74 = self::getImageUrl($this, "54x74");
//            $this->urlImageWork54x74 = $urlImageWork54x74;
//        }
//        return $this->urlImageWork54x74;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


    private static function getImageUrl(Work $work, string $format)
    {
        $file_url_image_anime = file_get_contents(
            $_SERVER["DOCUMENT_ROOT"] .
                "/assets/img/" . explode("\\", strtolower($work::class))[2]
                . "/$format" . "/" . $work->getIdWork() . ".json"
        );
        $json_url_image_anime = json_decode($file_url_image_anime);
        return ((array)$json_url_image_anime)['url'];
    }

    /**
     * Get the value of finish
     */
    public function isFinish(): ?bool
    {
        return $this->is_finish;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    /**
//     * Set the value of finish
//     *
//     * @param $is_finish
//     * @return  self
//     */
//    public function setFinish($is_finish): static
//    {
//        $this->is_finish = $is_finish;
//
//        return $this;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


    /**
     * Get the value of sysnopis
     */
    public function getSysnopis(): ?string
    {
        return $this->synopsis;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    /**
//     * Set the value of sysnopis
//     *
//     * @param $synopsis
//     * @return  self
//     */
//    public function setSysnopis($synopsis): static
//    {
//        if ($this instanceof Anime) {
//            //requete sql
//        } elseif ($this instanceof Manga) {
//            //requete sql
//        }
//        $this->synopsis = $synopsis;
//
//        return $this;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


    /**
     * Get the value of title_ja
     */
    public function getTitle_ja(): ?string
    {
        return $this->title_ja;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    /**
//     * Set the value of title_ja
//     *
//     * @param $title_ja
//     * @return  self
//     */
//    public function setTitle_ja($title_ja): static
//    {
//        $this->title_ja = $title_ja;
//
//        return $this;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


    /**
     * Get the value of title_en
     */
    public function getTitle_en(): ?string
    {
        return $this->title_en;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    /**
//     * Set the value of title_en
//     *
//     * @param $title_en
//     * @return  self
//     */
//    public function setTitle_en($title_en): static
//    {
//        $this->title_en = $title_en;
//
//        return $this;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)



    public function getIdWork(): int
    {
        return $this->idWork;
    }

    /**
     * Set the value of id_work
     *
     * @param $idWork
     * @return  self
     */
    public function setIdWork($idWork): static
    {
        $this->idWork = $idWork;
        return $this;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    /**
//     * Get the value of score
//     */
//    public function getScore()
//    {
//        return $this->score;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)


    /**
     * @param $score
     * @return  self
     */
    public function setScore($score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate(): DateTime|string|null
    {
        return $this->date;
    }

// --Commented out by Inspection START (20/04/2022 16:18):
//    /**
//     * Set the value of date
//     *
//     * @param $date
//     * @return  self
//     */
//    public function setDate($date): static
//    {
//        $this->date = $date;
//
//        return $this;
//    }
// --Commented out by Inspection STOP (20/04/2022 16:18)

}
