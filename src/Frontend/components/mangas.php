<?php

use CrowAnime\Backend\Work\Manga;

$mangas = [];
$style = "style='border-color: white;'";
$styles = [
    "popular" => "",
    "top" => ""
];

switch ($_GET['type']) {
    case 'popular':
        $styles['popular'] = "style='border-color: white;'";
        break;
    default:
        $styles['top'] = "style='border-color: white;'";
        break;
}

?>
<div class="sort">
    <div class="sort-by">
        <div class="sort-by-alphabet">
            <a href="" class="sort-by-alphabet-All">Tout</a> <a href="" class="sort-by-alphabet-#">#</a>
            <a href="" class="sort-by-alphabet-A">A</a> <a href="" class="sort-by-alphabet-B">B</a>
            <a href="" class="sort-by-alphabet-C">C</a> <a href="" class="sort-by-alphabet-D">D</a>
            <a href="" class="sort-by-alphabet-E">E</a> <a href="" class="sort-by-alphabet-F">F</a>
            <a href="" class="sort-by-alphabet-G">G</a> <a href="" class="sort-by-alphabet-H">H</a>
            <a href="" class="sort-by-alphabet-I">I</a> <a href="" class="sort-by-alphabet-J">J</a>
            <a href="" class="sort-by-alphabet-K">K</a> <a href="" class="sort-by-alphabet-L">L</a>
        </div>
        <div class="sort-by-alphabet">
            <a href="" class="sort-by-alphabet-M">M</a> <a href="" class="sort-by-alphabet-N">N</a>
            <a href="" class="sort-by-alphabet-O">O</a> <a href="" class="sort-by-alphabet-P">P</a>
            <a href="" class="sort-by-alphabet-Q">Q</a> <a href="" class="sort-by-alphabet-R">R</a>
            <a href="" class="sort-by-alphabet-S">S</a> <a href="" class="sort-by-alphabet-T">T</a>
            <a href="" class="sort-by-alphabet-U">U</a> <a href="" class="sort-by-alphabet-V">V</a>
            <a href="" class="sort-by-alphabet-X">W</a> <a href="" class="sort-by-alphabet-X">X</a>
            <a href="" class="sort-by-alphabet-Y">Y</a> <a href="" class="sort-by-alphabet-Z">Z</a>
        </div>
    </div>
</div>

<div class="list">
    <div class="list-top-name">
        <a href="<?= "" ?>">
            <p <?= $styles['top'] ?> class="list-top-name-p">Top Animes</p>
        </a>
        <a href="<?= "" ?>">
            <p <?= $styles['popular'] ?> class="list-top-name-p">Most Popular</p>
        </a>
    </div>
    <div class="list-container">
        <div class="list-items">
            <?php for($i = 0; $i < 20 ; $i++) :?>
                <a href="" class="list-item">
                    <div class="list-item-filter"></div>
                    <div class="list-item-desc">Manga Tittle</div>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div>