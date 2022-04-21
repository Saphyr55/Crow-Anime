<section id="section-left">
    <div class="news">
        <a class="angle angle-left"><i class="fa-solid fa-angle-left"></i></a>
        <ul>
            <li>
                <img class="img-news" src="/assets/img/distance.jpg" alt="" srcset="">
            </li>
        </ul>
        <a class="angle angle-right"><i class="fa-solid fa-angle-right"></i></a>
    </div>
    <div class="season-anime">
        <p class="p-anime">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/animes?type=seasonal" ?>">
                <?= $anime_season ?> <?= $actual_date ?> Anime
            </a>
        </p>
        <ol class="season-anime-img" style="list-style-type:none;">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <li class="anime">
                    <a href="">
                        <img class="anime-img"
                             src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $animes[$i]->getIdWork() . '.jpg' ?>"
                             alt="" srcset="">
                        <p class="name-anime">
                            <?= $animes[$i]->getTitle_ja() ?>
                        </p>
                    </a>
                </li>
            <?php endfor; ?>
        </ol>
    </div>
    <div class="season-anime">
        <p class="p-anime">
            <a href="">
                <?= $best_manga ?>
            </a>
        </p>
        <ol class="season-anime-img" style="list-style-type:none;">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <li class='anime'>
                    <a href=''>
                        <img class='anime-img' src='/assets/img/not_found.png' alt='' srcset=''>
                        <p class='name-anime'><?= $name_anime ?></p>
                    </a>
                </li>
            <?php endfor; ?>
        </ol>
    </div>
</section>