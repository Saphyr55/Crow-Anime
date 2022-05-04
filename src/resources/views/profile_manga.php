<main>
    <div class="profile_manga_grid">
        <div class="manga_img"><img class="manga_image" src=<?= "/assets/img/manga/".$current_manga->getIdWork() . '.jpg'?> alt="assets/img/not_found.png" /></div>
        <div class="manga_crow_data">
            <div class="area_title">Crow's Data</div>
            <div class="crow_data_grid">
                <div class="crow_data_score">
                    <div class="crow_data_score_content">
                        <div class="crow_data_score_title">SCORE</div>
                        <div class="crow_data_score_num"><?= round($current_manga->getScore(), 2) ?></div>
                    </div>
                </div>
                <div class="crow_data_member">MEMBER : <?= $members ?></div>
            </div>
        </div>
        <div class="manga_info">
            <div class="area_title_info">Informations</div>
            <div class="manga_info_content">
                <div class="manga_info_title_en">Titre anglais : <?= $current_manga->getTitle_en()?></div>
                <div class="manga_info_title_jp">Titre japonais : <?= $current_manga->getTitle_ja()?></div>
                <div class="manga_info_finish">Fini : <?= $current_manga->isFinish() ? 1 : 0?></div>
                <div class="manga_info_author">Auteur : <?= $current_manga->getAuthors()?></div>
                <div class="manga_info_edition">Edition : <?= $current_manga->getPublishingHouse()?></div>
                <div class="manga_info_volumes">Volumes : <?= $current_manga->getVolumes()?></div>
                <div class="manga_info_date">Date : <?= $current_manga->getDate()?></div>
            </div>
        </div>
        <div class="manga_synopsis">
            <div class="area_title">Synopsis</div>
            <p><?= $current_manga->getSynopsis() ?></p>
        </div>
        <div class="manga_charac">
            <div class="area_title">Characters</div>
        </div>
    </div>
</main>