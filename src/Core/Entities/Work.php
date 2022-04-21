<?php

namespace CrowAnime\Core\Entities;

use CrowAnime\Core\Entities\Anime;
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

    /**
     * Get the value of finish
     */
    public function isFinish(): ?bool
    {
        return $this->is_finish;
    }

    /**
     * Set the value of finish
     *
     * @param $is_finish
     * @return  self
     */
    public function setFinish($is_finish): static
    {
        $this->is_finish = $is_finish;

        return $this;
    }

    /**
     * Get the value of synopsis
     */
    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     *
     * @param $synopsis
     * @return  self
     */
    public function setSynopsis($synopsis): static
    {
        if ($this instanceof Anime) {
            //request sql
        } elseif ($this instanceof Manga) {
            //request sql
        }
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get the value of title_ja
     */
    public function getTitle_ja(): ?string
    {
        return $this->title_ja;
    }

    /**
     * Set the value of title_ja
     *
     * @param $title_ja
     * @return  self
     */
    public function setTitle_ja($title_ja): static
    {
        $this->title_ja = $title_ja;

        return $this;
    }

    /**
     * Get the value of title_en
     */
    public function getTitle_en(): ?string
    {
        return $this->title_en;
    }

    /**
     * Set the value of title_en
     *
     * @param $title_en
     * @return  self
     */
    public function setTitle_en($title_en): static
    {
        $this->title_en = $title_en;

        return $this;
    }

    /**
     * Get the value of id_work
     */
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

    /**
     * Get the value of score
     */
    public function getScore()
    {
        return $this->score;
    }

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

    /**
     * Set the value of date
     *
     * @param $date
     * @return  self
     */
    public function setDate($date): static
    {
        $this->date = $date;

        return $this;
    }
}
