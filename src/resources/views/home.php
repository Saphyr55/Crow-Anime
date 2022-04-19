<?php

use CrowAnime\Work\Anime;
use CrowAnime\Work\Season;

?>

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
                <?= ucfirst(strtolower(Season::getCurrentSeason())) . ' ' ?> <?= date('Y') . ' ' ?> <?= "Anime" ?>
            </a>
        </p>
        <ol class="season-anime-img" style="list-style-type:none;">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <?php $anime = Anime::getAnimesOfCurrentSeason()[$i]; ?>
                <li class="anime">
                    <a href="">
                        <img class="anime-img" src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $anime->getIdWork() . '.jpg' ?>" alt="" srcset="">
                        <p class="name-anime">
                            <?= $anime->getTitle_ja() ?>
                        </p>
                    </a>
                </li>
            <?php endfor; ?>
        </ol>
    </div>
    <div class="season-anime">
        <p class="p-anime">
            <a href="">
                DERNIER EPISODE
            </a>
        </p>
        <ol class="season-anime-img" style="list-style-type:none;">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <li class='anime'>
                    <a href=''>
                        <img class='anime-img' src='/assets/img/not_found.png' alt='' srcset=''>
                        <p class='name-anime'>Name anime</p>
                    </a>
                </li>
            <?php endfor; ?>
        </ol>
    </div>
</section>
<section class="section-right">
    <div class="div-top-anime">
        <p class="p-top-anime">LES MIEUX NOTÉ</p>
        <ol class="ol-top-anime">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <li>
                    <p class="top-number"><?= $i ?></p>
                    <a href="" class="top-img">
                        <img src="/assets/img/not_found.png" alt="">
                    </a>
                    <a href="" class="name-anime na">
                        <p>Name anime</p>
                    </a>
                    <p class="scored">Scored : 0.00</p>
                    <p class="members">Members : 0</p>
                </li>
            <?php endfor; ?>
        </ol>
    </div>
</section>