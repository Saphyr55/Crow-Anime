<main>
    <div class="list">
        <div class="list-top-name">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/animes" ?>">
                <p>Anime</p>
            </a>
        </div>
        <div class="list-container">
            <div class="list-items">
                <?php if (!empty($animes)) : ?>
                    <?php for ($i = 0; $i < 20; $i++) : ?>
                        <?php if ($i <= (count($animes) - 1)) : ?>
                            <a href="<?= "http://$_SERVER[HTTP_HOST]/anime/".$animes[$i]->getIdWork() ?>" class="list-item">
                                    <img class="list-item-filter"
                                         src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $animes[$i]->getIdWork() . '.jpg' ?>"
                                         alt="">
                                <div class="list-item-desc">
                                    <?= $animes[$i]->getTitle_ja() ?>
                                </div>
                            </a>
                        <?php endif; ?>
                <?php endfor; ?>
                <?php else: ?>
                    <p style="font-size: 30px">Aucun anime trouvé</p>
                <?php endif; ?>
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
                <?php if (!empty($mangas)) : ?>
                    <?php for ($i = 0; $i < 20; $i++) : ?>
                    <?php if ($i <= (count($mangas) - 1)) : ?>
                        <a href="<?= "http://$_SERVER[HTTP_HOST]/manga/".$mangas[$i]->getIdWork() ?>" class="list-item">
                                <img class="list-item-filter"
                                     src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $mangas[$i]->getIdWork() . '.jpg' ?>" alt="">
                            <div class="list-item-desc">
                                <?= $mangas[$i]->getTitle_ja() ?>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php else: ?>
                    <p style="font-size: 30px">Aucun manga trouvé</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="list">
        <div class="list-top-name">
            <a>
                <p>Profile</p>
            </a>
        </div>
        <div class="list-container">
            <div class="list-items">
                <?php if (!empty($profiles)) : ?>
                <?php for ($i = 0; $i < 20; $i++) : ?>
                    <?php if ($i <= (count($profiles) - 1)) : ?>
                        <a href="<?= "/profile/".$profiles[$i]->getUsername() ?>" class="list-item">
                            <img class="list-item-filter"
                                 src="<?=  "/assets/img/users/" . $profiles[$i]->getIdUser() . '.jpg' ?>" alt="">
                            <div class="list-item-desc">
                                <?= $profiles[$i]->getUsername() ?>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php else: ?>
                    <p style="font-size: 30px">Aucun profile trouvé</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>