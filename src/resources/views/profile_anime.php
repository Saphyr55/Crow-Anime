<main>
    <div class="profile_anime_grid">
        <div class="anime_img"><img class="anime_image" src=<?= "/assets/img/anime/".$current_anime->getIdWork() . '.jpg'?> alt="assets/img/not_found.png" /></div>
        <div class="anime_crow_data">
            <div class="area_title">Crow's Data</div>
            <div class="crow_data_grid">
                <div class="crow_data_score">
                    <div class="crow_data_score_content">
                        <div class="crow_data_score_title">SCORE</div>
                        <div class="crow_data_score_num"><?= round($current_anime->getScore(), 2) ?></div>
                    </div>
                </div>
                <div class="crow_data_member">MEMBER : <?= $members ?></div>
            </div>
        </div>
        <div class="anime_info">
            <div class="area_title_info">Informations</div>
            <div class="anime_info_content">
                <div class="anime_info_title_en">Titre anglais : <?=$current_anime->getTitle_en()?></div>
                <div class="anime_info_title_jp">Titre japonais : <?=$current_anime->getTitle_ja()?></div>
                <div class="anime_info_finsih">Fini : <?=$current_anime->isFinish() ? 1 : 0?></div>
                <div class="anime_info_season">Saison(s) : <?= $current_anime->getSeason() ?></div>
                <div class="anime_info_studio">Studio : <?= $current_anime->getStudio() ?></div>
                <div class="anime_info_date">Date : <?= $current_anime->getDate() ?></div>
            </div>
        </div>
        <div class="anime_synopsis">
            <div class="area_title">Synopsis</div>
            <p><?= $current_anime->getSynopsis() ?></p>
        </div>
        <div class="anime_charac">
            <div class="area_title">Characters</div>
        </div>
    </div>
</main>