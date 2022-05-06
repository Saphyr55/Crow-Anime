<div class="list">
    <div class="list-top-name">
        <a href="<?= "http://$_SERVER[HTTP_HOST]/animes" ?>">
            <p <?= $styles['top'] ?> class="list-top-name-p"><?= $top_anime ?></p>
        </a>
        <a href="<?= "http://$_SERVER[HTTP_HOST]/animes?type=popular" ?>">
            <p <?= $styles['popular'] ?> class="list-top-name-p"><?= $most_popular ?></p>
        </a>
        <a href="<?= "http://$_SERVER[HTTP_HOST]/animes?type=seasonal" ?>">
            <p <?= $styles['seasonal'] ?> class="list-top-name-p"><?= $current_season ?><?= $current_year ?></p>
        </a>
    </div>
    <div class="list-container">
        <div class="list-items">
            <?php for ($i = 0; $i < 20 && $i < count($animes) ; $i++) : ?>
                <a href="<?= "http://$_SERVER[HTTP_HOST]/anime/".$animes[$i]->getIdWork() ?>" class="list-item">
                        <img class="list-item-filter"
                             src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $animes[$i]->getIdWork() . '.jpg' ?>"
                             alt="">
                    <div class="list-item-desc">
                        <?= ($i <= count($animes) - 1) ? $animes[$i]->getTitle_ja() : "Anime Title" ?>
                    </div>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div>