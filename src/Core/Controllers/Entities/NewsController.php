<?php

namespace CrowAnime\Core\Controllers\Entities;

use CrowAnime\Core\Entities\News;
use CrowAnime\Core\Forms\Entities\NewsForm;

class NewsController extends \CrowAnime\Core\Controllers\Controller
{

    public function action(): void
    {
        $newsForm = new NewsForm();
        $data = $newsForm->getDataFromForm();
        $data['news']?->sendDatabase();
        $this->with([
            'error_msg_add_news' => $data['error'],
            'news_text' => $data['news']?->getNewsText(),
            'news_url_video' => $data['news']?->getNewsURLVideo(),
            'all_news' => News::getNews()
        ]);
    }

}