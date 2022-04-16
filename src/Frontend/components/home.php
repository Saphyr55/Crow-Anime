<?php

use CrowAnime\Backend\Work\Anime;
use CrowAnime\Backend\Work\Season;

?>

<body>
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
                <a href="">
                    <?php echo ucfirst(strtolower(Season::getCurrentSeason())) . ' ';
                    echo date('Y') . ' ';
                    echo "Anime" ?>
                </a>
            </p>
            <ol class="season-anime-img" style="list-style-type:none;">
                <?php
                for ($i = 0; $i < 6; $i++) {
                    echo "
                    <li class='anime'>
                        <a href=''>
                            <img class='anime-img' src=" .
                        "http://$_SERVER[HTTP_HOST]/assets/img/anime/" .
                        Anime::getAnimesOfCurrentSeason()[$i]['id_anime'] . '.jpg' . " alt='' srcset=''>
                            <p class='name-anime'>" .
                        Anime::getAnimesOfCurrentSeason()[$i]['anime_title_ja'] . "</p>
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
                for ($i = 0; $i < 6; $i++) {
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