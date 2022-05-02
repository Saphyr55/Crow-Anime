<main>
    <div class="profile_anime_grid">
        <div class="anime_img"><img class="anime_image" src=<?= "/assets/img/anime/".$current_anime->getIdWork() . '.jpg'?> alt="assets/img/not_found.png" /></div>
        <div class="anime_crow_data">
            <div class="area_tittle">Crow's Data</div>
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
            <div class="area_tittle_info">Informations</div>
        </div>
        <div class="anime_synopsis">
            <div class="area_tittle">Synopsis</div>
            <p><?= $current_anime->getSynopsis() ?></p>
        </div>
        <div class="anime_charac">
            <div class="area_tittle">Characters</div>
        </div>
    </div>
</main>