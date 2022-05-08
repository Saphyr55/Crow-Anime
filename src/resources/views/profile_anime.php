<main>
    <?php if ($currentUserExist) : ?>
        <div class="anime_user_input">
            <?php if (!$isInList) : ?>
                <div class="anime_ajout">
                    <form action="" method="post">
                        <button type="submit" name="button_add" id="anime_ajout_button"><?= $add_list ?></button>
                    </form>
                </div>
            <?php else : ?>
                <div class="anime_ajout">
                    <form action="" method="post">
                        <button type="submit" name="button_delete" id="anime_ajout_button"><?= $delete_list ?></button>
                    </form>
                </div>
            <?php endif; ?>
            <div class="anime_note">
                <form action="" method="post">
                    <div class="anime_note_content"><?= $rate ?>
                        <input type="range" id="note" name="note_value" value="<?= $score ?>" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output><?= $score ?></output>
                        <input name="note_submit" type="submit" id="note_submit" value="<?= $send_note ?>">
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <div class="profile_anime_grid">
        <div class="anime_img"><img class="anime_image" src=<?= "/assets/img/anime/" . $current_anime->getIdWork() . '.jpg' ?> alt="assets/img/not_found.png" /></div>
        <div class="anime_crow_data">
            <div class="area_title">Crow's Data</div>
            <div class="crow_data_grid">
                <div class="crow_data_score">
                    <div class="crow_data_score_content">
                        <div class="crow_data_score_title">SCORE</div>
                        <div class="crow_data_score_num"><?= round($current_anime->getScore(), 2) ?></div>
                    </div>
                </div>
                <div class="crow_data_member"><?= $crow_data_member ?><?= $members ?></div>
            </div>
        </div>
        <div class="anime_info">
            <div class="area_title_info">Informations</div>
            <div class="anime_info_content">
                <div class="anime_info_title_en"><?= $anime_info_title_en ?> <?= $current_anime->getTitle_en() ?></div>
                <div class="anime_info_title_jp"><?= $anime_info_title_jp ?> <?= $current_anime->getTitle_ja() ?></div>
                <div class="anime_info_finsih"><?= $anime_info_finsih ?> <?= intval($current_anime->isFinish()) === 0 ? $no  : $yes ?></div>
                <div class="anime_info_season"><?= $anime_info_season ?> <?= $current_anime->getSeason() ?></div>
                <div class="anime_info_studio">Studio : <?= $current_anime->getStudio() ?></div>
                <div class="anime_info_date">Date : <?= explode(" ", $current_anime->getDate())[0] ?></div>
            </div>
        </div>
        <div class="anime_synopsis">
            <div class="area_title">Synopsis</div>
            <p><?= $current_anime->getSynopsis() ?></p>
        </div>
        <div class="anime_characs">
            <div class="area_title"><?= $anime_charac ?></div>
        </div>
        <div class="list-character-selected">
            <form action="" method="post">
                <input id="character-input" type="text">
                <div id="list-character-buttons" class="list-character-buttons">

                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready( function() {
            $('#character-input').keyup( function() {

                $('#character-input').html('');
                let character = $(this).val();

                if (character != null) {
                    $.ajax({
                        type: 'GET',
                        url: '/ajax/ajax',
                        data: 'character=' + encodeURIComponent(character),
                        success: function(data) {
                            document.getElementById('list-character-buttons').innerHTML = data;
                        }
                    });
                }
            });
        });
    </script>
</main>