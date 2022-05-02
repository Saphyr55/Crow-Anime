<?php $get_view('header/sort') ?>
<div class="list">
    <div class="list-top-name">
        <p class="list-top-name-p"><?= $mangas_read ?></p>
    </div>
    <div class="list-container">
        <div class="list-items">
            <?php if (count($mangas) !== 0) : ?>
                <?php for ($i = 0; $i < count($mangas); $i++) : ?>
                    <a href="<?= "http://$_SERVER[HTTP_HOST]/manga/".$mangas[$i]->getIdWork()?>" class="list-item">
                        <img class="list-item-filter"
                             src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $mangas[$i]->getIdWork() . '.jpg' ?>">
                        <div class="list-item-desc">
                            <?= $mangas[$i]->getTitle_ja() ?>
                        </div>
                    </a>
                <?php endfor; ?>
            <?php else : ?>
                <p style="margin: 30vh; font-size: 50px; text-align:center;"><?= $any_manga_read ?></p>
            <?php endif; ?>
        </div>
        <style>
            .list-top-name {
                width: max-content;
            }
        </style>
    </div>
</div>