<main>
    <div class="list">
        <div class="list-top-name">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/animes" ?>">
                <p>Anime</p>
            </a>
        </div>
        <div class="list-container">
            <div class="list-items">
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <?php if ($i <= (count($animes) - 1)) : ?>
                        <a href="<?= "http://$_SERVER[HTTP_HOST]/anime/".$animes[$i]->getIdWork() ?>" class="list-item">
                                <img class="list-item-filter"
                                     src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $animes[$i]->getIdWork() . '.jpg' ?>"
                                     alt="">
                            <div class="list-item-desc">
                                <?= ($i <= count($animes) - 1) ? $animes[$i]->getTitle_ja() : "Anime Title" ?>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="list-top-name">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>">
                <p>Manga</p>
            </a>
        </div>
        <div class="list-container">
            <div class="list-items">
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <?php if ($i <= (count($mangas) - 1)) : ?>
                        <a href="<?= "http://$_SERVER[HTTP_HOST]/manga/".$mangas[$i]->getIdWork() ?>" class="list-item">
                                <img class="list-item-filter"
                                     src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $mangas[$i]->getIdWork() . '.jpg' ?>" alt="">
                            <div class="list-item-desc">
                                <?= ($i <= count($mangas) - 1) ? $mangas[$i]->getTitle_ja() : "Manga Title" ?>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="list-top-name">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>">
                <p>Profile</p>
            </a>
        </div>
        <div class="list-container">
            <div class="list-items">
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <?php if ($i <= (count($mangas) - 1)) : ?>
                        <a href="<?= "http://$_SERVER[HTTP_HOST]/manga/".$mangas[$i]->getIdWork() ?>" class="list-item">
                            <img class="list-item-filter"
                                 src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $mangas[$i]->getIdWork() . '.jpg' ?>" alt="">
                            <div class="list-item-desc">
                                <?= ($i <= count($mangas) - 1) ? $mangas[$i]->getTitle_ja() : "Manga Title" ?>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</main>