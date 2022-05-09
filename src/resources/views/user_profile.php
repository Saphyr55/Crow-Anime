<main>
    <div class="anime-part">
        <h2><?= $stats_anime ?></h2>
        <div class="first-update-container">
            <p><?= $total_watch ?><span class="bold"><?= $total_anime ?></span></p>
            <p><?= $mean_score ?><span class="bold"> <?= $mean_animes ?> </span></p>
        </div>
        <div class="last-update-container">
            <h3><?= $last_uptade ?></h3>
            <div class="last-update">
                <?php for($i = 0 ; $i < 4 ; $i++) : ?>
                    <?php if ($i <= (count($animes) - 1)) : ?>
                        <div>
                            <a href="<?= "/anime/".$animes[$i]['id_anime'] ?>">
                                <img alt="" src="<?= "/assets/img/anime/" . $animes[$i]['id_anime'].'.jpg' ?> " >
                            </a>
                            <div>
                                <a class="title" href="<?= "/anime/".$animes[$i]['id_anime'] ?>">
                                    <?= $animes[$i]['anime_title_ja'] ?>
                                </a>
                                <p><?= $scored ?> <?= $animes[$i]['score'] ?> </p>
                                <p>Date : <?= $animes[$i]['add_date']?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
    <div class="profile-part">
        <div class="profile-part-first">
            <h1><?= $profile_username ?><?= $profile_user ?></h1>
        </div>
        <img src="<?= $path_profile_picture ?>" alt="">
        <div class="profile-part-last">
            <div class="button-to">
                <a class="button-to-list" id="button-to-list-anime" href="<?= $redirect_animes_list ?>"><?= $anime_list ?></a>
                <a class="button-to-list" id="button-to-list-manga" href="<?= $redirect_mangas_list ?>"><?= $manga_list ?></a>
            </div>
            <p><?= $joined ?> <?= $profile_date_join ?></p>
            <?php if($is_current_user()) : ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="picture-profile">
                        <input name="profile_picture" id="picture-profile" type="file" required>
                        <i class="fa-solid fa-gear"></i>
                        <?= $change_picture ?>
                    </label>
                    <input id="submit_picture_profile" name="submit_picture_profile" value="<?= $save ?>" type="submit">
                </form>
            <?php endif; ?>
        </div>
    </div>
    <div class="manga-part">
        <h2><?= $stats_manga ?></h2>
        <div>
            <p><?= $total_read ?><span class="bold"><?= $total_manga ?></span> </p>
            <p><?= $mean_score ?><span class="bold"><?= $mean_mangas ?></span></p>
        </div>
        <div class="last-update-container">
            <h3><?= $last_uptade ?></h3>
            <div class="last-update">
                <?php for($i = 0 ; $i < 4 ; $i++) : ?>
                    <?php if ($i <= (count($mangas) - 1)) : ?>
                        <div>
                            <a href="<?= "/manga/".$mangas[$i]['id_manga'] ?>">
                                <img alt="" src="<?= "/assets/img/manga/" . $mangas[$i]['id_manga'].'.jpg' ?> " >
                            </a>
                            <div>
                                <a class="title" href="<?= "/manga/".$mangas[$i]['id_manga'] ?>">
                                    <?= $mangas[$i]['manga_title_ja'] ?>
                                </a>
                                <p><?= $scored ?> <?= $mangas[$i]['score'] ?></p>
                                <p>Date : <?= $mangas[$i]['add_date']?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</main>
