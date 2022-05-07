<main>
    <div class="anime-part">
        <h2>Stats Anime</h2>
        <div class="first-update-container">
            <p>Total watch : <span class="bold"><?= $total_anime ?></span></p>
            <p>Mean Score : <span class="bold"> <?= $mean_animes ?> </span></p>
        </div>
        <div class="last-update-container">
            <h3>Last Update</h3>
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
                                <p>scored : <?= $animes[$i]['score'] ?> </p>
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
            <h1><?= $profile_username ?> Profile</h1>
        </div>
        <img src="<?= $path_profile_picture ?>" alt="">
        <div class="profile-part-last">
            <div class="">
                <a class="button-to-list" href="<?= $redirect_animes_list ?>">Anime List</a>
                <a class="button-to-list" href="<?= $redirect_mangas_list ?>">Manga List</a>
            </div>
            <p>Joined : <?= $profile_date_join ?></p>
            <?php if($is_current_user()) : ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="picture-profile">
                        <input name="profile_picture" id="picture-profile" type="file" required>
                        <i class="fa-solid fa-gear"></i>
                        Change Picture
                    </label>
                    <input name="submit_picture_profile" value="Save" type="submit">
                </form>
            <?php endif; ?>
        </div>
    </div>
    <div class="manga-part">
        <h2>Stats Manga</h2>
        <div>
            <p>Total read : <span class="bold"><?= $total_manga ?></span> </p>
            <p>Mean Score :  <span class="bold"><?= $mean_mangas ?></span></p>
        </div>
        <div class="last-update-container">
            <h3>Last Update</h3>
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
                                <p>scored :  <?= $mangas[$i]['score'] ?></p>
                                <p>Date : <?= $mangas[$i]['add_date']?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</main>
