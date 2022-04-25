<?php

namespace CrowAnime\Core\Entities;

use CrowAnime\Core\Database\Database;

class News
{
    private int $id;
    private string $newsText;
    private string $newsURLVideo;

    public function __construct(string $newsText, string $newsURLVideo, bool $format = true)
    {
        $this->newsText = $newsText;
        if ($format) $this->newsURLVideo = 'https://www.youtube.com/embed/'.explode('=',explode('?', $newsURLVideo)[1])[1];
        else $this->newsURLVideo = $newsURLVideo;
    }

    public function sendDatabase() : void
    {
        Database::getDatabase()->execute(
            "INSERT INTO news (news_text, news_date, news_url_video) 
                      VALUES (:news_text, :news_date, :news_url_video)",
            [
                ':news_text' => $this->newsText,
                ':news_date' => date('Y-m-d'),
                ':news_url_video' => $this->newsURLVideo
            ]
        );
    }

    public static function getNews() : array
    {
        return self::convertArrayToNews(Database::getDatabase()->query('SELECT * FROM news ORDER BY id_news DESC'));
    }

    private static function convertArrayToNews($sdtClass): array
    {
        $all_news = [];
        foreach ($sdtClass as $value) {
            $value = (array) $value;
            $news = new News(
                $value['news_text'],
                $value['news_url_video'],
                false
            );
            $news->setId($value['id_news']);
            $all_news[] = $news;
        }
        return $all_news;
    }

    /**
     * @return string
     */
    public function getNewsText(): string
    {
        return $this->newsText;
    }

    /**
     * @param string $newsText
     */
    public function setNewsText(string $newsText): void
    {
        $this->newsText = $newsText;
    }

    /**
     * @return string
     */
    public function getNewsURLVideo(): string
    {
        return $this->newsURLVideo;
    }

    /**
     * @param string $newsURLVideo
     */
    public function setNewsURLVideo(string $newsURLVideo): void
    {
        $this->newsURLVideo = $newsURLVideo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    private function setId(int $id): void
    {
        $this->id = $id;
    }



}
