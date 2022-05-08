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
                    <input name="note_submit" type="submit" value="<?=$send_note?>" id="note_submit">
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
                <div class="crow_data_member"><?= $crow_data_member ?><?= $members ?></div>
            </div>
        </div>
        <div class="manga_info">
            <div class="area_title_info">Informations</div>
            <div class="manga_info_content">
                <div class="manga_info_title_en"><?= $manga_info_title_en ?> <?= $current_manga->getTitle_en()?></div>
                <div class="manga_info_title_jp"><?= $manga_info_title_jp ?> <?= $current_manga->getTitle_ja()?></div>
                <div class="manga_info_finish"><?= $manga_info_finsih ?> <?= intval($current_manga->isFinish())===0 ? $no  : $yes ?></div>
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
        <div class="manga_character">
            <div class="area_title"><?= $manga_charac ?>
                <?php if($current_user_is_admin()): ?>
                <a href="#charac_modal" class="manga_add_charac">
                <?= $manga_add_charac ?>
                </a>
                <div id="charac_modal" class="modal">
                    <div class="modal_content">
                        <div class="modal_title"><?= $modal_title ?>
                            <form class="charac_all-search-bar" action="" method="POST">
                                <input id="character-input" class="charac_search-bar input" name="charac_request" type="text" placeholder="<?= $search ?>">
                            </form>
                        </div>
                        <a href="#" class="modal_close">&times;</a>
                        <form id="modal-buttons" action="" class="modal_buttons" method="POST">

                        </form>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="manga_characs">
                <?php for ($i = 0; $i < count($characters); $i++) : ?>
                    <div class="anime_charac">
                        <img class="anime_charac_img" src="<?= "/assets/img/characters/" . $characters[$i]->getCharacterId() .".jpg" ?>">
                        <p class="anime_charac_name"><?= $characters[$i]->getName() ?></p>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function request_access($this){
            $(document).ready( function() {
                $.ajax({
                    async: false,
                    url: '/ajax/ajax',
                    type: 'get',
                    data: 'character_id_manga=' + $this.id,
                    success: function (data) {
                        window.location.replace(
                            window.location.pathname
                        );
                    }
                });
            });
        }
        $(document).ready( function() {
            $('#character-input').keyup( function() {

                $('#character-input').html('');
                let character = $(this).val();

                if (character != null) {
                    $.ajax({
                        type: 'GET',
                        url: '/ajax/ajax',
                        data: 'character_manga=' + encodeURIComponent(character),
                        success: function(data) {
                            document.getElementById('modal-buttons').innerHTML = data;
                        }
                    });
                }
            });
        });
    </script>
</main>