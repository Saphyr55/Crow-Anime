<main>
    <?php if($currentUserExist): ?>
    <div class="anime_user_input">
        <?php if(!$isInList): ?>
        <div class="anime_ajout">
            <form action="" method="post">
                <button type="submit" name="button_add" id="anime_ajout_button"><?= $add_list ?></button>
            </form>
        </div> 
        <?php else: ?>
            <div class="anime_ajout">
                <form action="" method="post">
                    <button type="submit" name="button_delete" id="anime_ajout_button"><?= $delete_list ?></button>
                </form>
            </div>
        <?php endif; ?>
        <div class="anime_note">
            <form action="" method="post">
                <div class="anime_note_content">Notez
                    <input type="range" id="note" name="note_value" value="<?= $score ?>" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                    <output><?= $score ?></output>
                    <input type="submit" name="note_submit" id="note_submit" name="submit">
                </div>   
            </form>
        </div>
    </div>
    <?php endif; ?>
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
                <div class="anime_info_finsih">Fini : <?=intval($current_anime->isFinish())===0 ? "Non" : "Oui" ?></div>
                <div class="anime_info_season">Saison(s) : <?= $current_anime->getSeason() ?></div>
                <div class="anime_info_studio">Studio : <?= $current_anime->getStudio() ?></div>
                <div class="anime_info_date">Date : <?= explode(" ",$current_anime->getDate())[0] ?></div>
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