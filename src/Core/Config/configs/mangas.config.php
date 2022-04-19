<?php

use CrowAnime\Work\Manga;

$mangas = [];
$style = "style='border-color: white;'";
$styles = [
    "popular" => "",
    "top" => ""
];

switch ($_GET['type']) {
    case 'popular':
        $mangas = Manga::getMostPopularMangas();
        $styles['popular'] = "style='border-color: white;'";
        break;
    case 'recent_upload':
        $mangas = Manga::recentUpload();
        break;
    default:
        $mangas = Manga::getTopAnimes();
        $styles['top'] = "style='border-color: white;'";
        break;
}
