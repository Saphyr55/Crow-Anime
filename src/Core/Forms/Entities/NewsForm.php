<?php

namespace CrowAnime\Core\Forms\Entities;

class NewsForm extends \CrowAnime\Core\Forms\Form
{

    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }

    public function getDataFromForm()
    {
        $news = null;
        $error = '';
        $regex = '~^(?:https?://)?(?:www[.])?(?:youtube[.]com/watch[?]v=|youtu[.]be/)([^&]{11})~x';
        if (isset($_POST['news_submit'])) {
            if (isset($_POST['news_text']) && isset($_POST['news_url']) && preg_match($regex, $_POST['news_url'])){
                $news = new \CrowAnime\Core\Entities\News(htmlspecialchars($_POST['news_text']), $_POST['news_url']);
            }
            else $error = 'champs non valide';
        }
        return [
            'news' => $news,
            'error' => $error
        ];
    }

}