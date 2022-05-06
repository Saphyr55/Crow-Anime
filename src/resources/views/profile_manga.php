<main>
<?php if($currentUserExist): ?>
    <div class="manga_user_input">
        <?php if(!$isInList): ?>
        <div class="manga_ajout">
            <form action="" method="post">
                <button type="submit" name="button_add" id="manga_ajout_button"><?= $add_list ?></button>
            </form>
        </div> 
        <?php else: ?>
            <div class="manga_ajout">
                <form action="" method="post">
                    <button type="submit" name="button_delete" id="manga_ajout_button"><?= $delete_list ?></button>
                </form>
            </div>
        <?php endif; ?>
        <div class="manga_note">
            <form action="" method="post">
                <div class="manga_note_content"><?= $rate ?>
                    <input type="range" id="note" name="note_value" value="<?= $score ?>" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                    <output><?= $score ?></output>
                    <input type="submit" value="<?=$send_note?>" id="note_submit">
                </div>   
            </form>
        </div>
    </div>
    <?php endif; ?>
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
                <div class="manga_info_title_en"><?= $anime_info_title_en ?> <?= $current_manga->getTitle_en()?></div>
                <div class="manga_info_title_jp"><?= $anime_info_title_jp ?> <?= $current_manga->getTitle_ja()?></div>
                <div class="manga_info_finish"><?= $anime_info_finsih ?> <?= intval($current_manga->isFinish())===0 ? "Non" : "Oui" ?></div>
                <div class="manga_info_author"><?= $manga_info_author ?> <?= $current_manga->getAuthors()?></div>
                <div class="manga_info_edition">Edition : <?= $current_manga->getPublishingHouse()?></div>
                <div class="manga_info_volumes">Volumes : <?= $current_manga->getVolumes()?></div>
                <div class="manga_info_date">Date : <?= explode(" ",$current_manga->getDate())[0] ?></div>
            </div>
        </div>
        <div class="manga_synopsis">
            <div class="area_title">Synopsis</div>
            <p><?= $current_manga->getSynopsis() ?></p>
        </div>
        <div class="manga_charac">
            <div class="area_title"><?= $anime_charac ?></div>
        </div>
    </div>
</main>