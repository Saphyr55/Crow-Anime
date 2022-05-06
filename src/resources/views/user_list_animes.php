<div class="list">
    <div class="list-top-name">
        <p class="list-top-name-p"><?= $animes_watch ?></p>
    </div>
    <div class="list-container">
        <div class="list-items">
            <?php if (count($animes) !== 0) : ?>
                <?php for ($i = 0; $i < count($animes); $i++) : ?>
                    <a href="<?= "http://$_SERVER[HTTP_HOST]/anime/".$animes[$i]->getIdWork() ?>" class="list-item">
                        <img class="list-item-filter"
                             src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $animes[$i]->getIdWork() . '.jpg' ?>">
                        <div class="list-item-desc">
                            <?= $animes[$i]->getTitle_ja() ?>
                        </div>
                    </a>
                <?php endfor; ?>
            <?php else: ?>
                <p style="margin: 30vh; font-size: 50px; text-align:center;"><?= $any_anime_watch  ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>