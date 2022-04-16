<?php

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Work\Season;

$animes_current_season = Database::getDatabase()->execute(
    "SELECT id_anime, anime_title_ja FROM anime
	 WHERE anime_season=:anime_season
     AND strftime('%Y', anime_date)=:anime_date",
    [
        ':anime_season' => Season::getCurrentSeason(),
        ':anime_date' => date('Y')
    ]
);

?>

<body>
    <section id="section-left">
        <div class="news">
            <a class="angle angle-left"><i class="fa-solid fa-angle-left"></i></a>
            <img class="img-news" src="/assets/img/not_found.png" alt="" srcset="">
            <a class="angle angle-right"><i class="fa-solid fa-angle-right"></i></a>
        </div>
        <div class="season-anime">
            <p class="p-anime">
                <a href="">
                    <?php echo ucfirst(strtolower(Season::getCurrentSeason())) . ' ';
                    echo date('Y') . ' ';
                    echo "Anime" ?>
                </a>
            </p>
            <ol class="season-anime-img" style="list-style-type:none;">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo "
                    <li class='anime'>
                        <a href=''>
                            <img class='anime-img' src=" . "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $animes_current_season[$i]['id_anime'] . '.jpg' . " alt='' srcset=''>
                            <p class='name-anime'>" . $animes_current_season[$i]['anime_title_ja'] . "</p>
                        </a>            
                    </li>
                    ";
                }
                ?>
            </ol>
        </div>
        <div class="season-anime">
            <p class="p-anime">
                <a href="">
                    DERNIER EPISODE
                </a>
            </p>
            <ol class="season-anime-img" style="list-style-type:none;">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    echo
                    "<li class='anime'>
                            <a href=''>
                                <img class='anime-img' src='/assets/img/not_found.png' alt='' srcset=''>
                                <p class='name-anime'>Name anime</p>
                            </a>            
                        </li>
                        ";
                }
                ?>
            </ol>
        </div>
    </section>
    <section class="section-right">
        <div class="div-top-anime">
            <p class="p-top-anime">LES MIEUX NOTÉ</p>
            <ol class="ol-top-anime">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    echo
                    "
                    <li>
                        <p class='top-number'>$i</p>
                        <a href='' class='top-img'>
                            <img src='/assets/img/not_found.png' alt=''>
                        </a>
                        <a href=\"\" class=\"name-anime na\">
                            <p>Name anime</p>
                        </a>
                        <p class=\"scored\">Scored : 0.00</p>
                        <p class=\"members\">Members : 0</p>                    
                    </li>
                    ";
                }
                ?>
            </ol>
        </div>
    </section>
</body>