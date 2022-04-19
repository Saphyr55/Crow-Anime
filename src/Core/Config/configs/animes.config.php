<?php

use CrowAnime\Work\Anime;

$animes = [];
$style = "style='border-color: white;'";
$styles = [
    "seasonal" => "",
    "popular" => "",
    "top" => ""
];

switch ($_GET['type']) {
    case 'seasonal':
        $animes = Anime::getAnimesOfCurrentSeason();
        $styles['seasonal'] = "style='border-color: white;'";
        break;
    case 'popular':
        $animes = Anime::getMostPopularAnimes();
        $styles['popular'] = "style='border-color: white;'";
        break;
    case 'recent_upload':
        $animes = Anime::recentAnimesUpload();
        break;
    default:
        $animes = Anime::getTopAnimes();
        $styles['top'] = "style='border-color: white;'";
        break;
}
