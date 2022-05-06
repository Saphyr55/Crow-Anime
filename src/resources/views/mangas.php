<div class="list">
    <div class="list-top-name">
        <a href="<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>">
            <p <?= $styles['top'] ?> class="list-top-name-p"><?= $top_manga ?></p>
        </a>
        <a href="<?= "http://$_SERVER[HTTP_HOST]/mangas?type=popular" ?>">
            <p <?= $styles['popular'] ?> class="list-top-name-p"><?= $most_popular ?></p>
        </a>
    </div>
    <div class="list-container">
        <div class="list-items">
            <?php for ($i = 0; $i < count($mangas) && $i < 20; $i++) : ?>
                    <a href="<?= "http://$_SERVER[HTTP_HOST]/manga/".$mangas[$i]->getIdWork() ?>" class="list-item">
                        <img class="list-item-filter"
                             src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $mangas[$i]->getIdWork() . '.jpg' ?>">
                    <div class="list-item-desc">
                        <?= ($i <= count($mangas) - 1) ? $mangas[$i]->getTitle_ja() : "Manga Title" ?>
                    </div>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div>