<body>
<header id="header">
    <div class="top-header">
        <div class=''>
            <a href="<?= "http://$_SERVER[HTTP_HOST]/home" ?>">
                <img class='logo' src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/logo.png" ?>" alt='' srcset=''>
            </a>
        </div>
        <?php if (!isset($_SESSION['user'])) : ?>
            <div class='profile profil'>
                <a href="<?= "http://$_SERVER[HTTP_HOST]/login" ?> ">
                    <p class='connected'>SE CONNECTER</p>
                </a>
                <a href="<?= "http://$_SERVER[HTTP_HOST]/signup" ?> ">
                    <p>S'ENREGISTER</p>
                </a>
            </div>
        <?php else : ?>
            <?php $username = $_SESSION['user']->getUsername(); ?>
            <div class="profil">
                <div class="div-profile">
                    <a class="" onclick="displayScrollMenuOnClick()">
                        <i class="fa-solid fa-bars white"></i>
                        <p class="p-profile"><?= $_SESSION['user']->getUsername() ?></p>
                    </a>
                    <div id="scroll-menu" class="scroll-menu">
                        <ul>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/profile/" . $username ?>" class="white"><i class="fa-solid fa-user"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                            <?php if ($_SESSION['user']->isAdmin()) : ?>
                                <li>
                                    <a href="<?= "http://$_SERVER[HTTP_HOST]/admin/" . $username ?>" class="white"><i class="fa-solid fa-hammer"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/profile/" . $username . "/animeslist" ?>" class="white"><i class="fa-solid fa-book"></i>
                                    <p>List Animes</p>
                                </a>
                            </li>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/profile/" . $username . "/mangaslist" ?>" class="white"><i class="fa-solid fa-book"></i>
                                    <p>List Mangas</p>
                                </a>
                            </li>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/logout"?>" class="white"><i class="fa-solid fa-right-from-bracket"></i>
                                    <p>Lougout</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script>
        function displayScrollMenuOnClick() {
            var div = document.getElementById('scroll-menu');
            if (!div.style.display || div.style.display === 'block') div.style.display = 'none';
            else div.style.display = 'block';
        }
    </script>
    <div class=" bottom-header">
        <div>
            <a href=<?= "http://$_SERVER[HTTP_HOST]/animes" ?>>
                <p>ANIME</p>
            </a>
            <a href=<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>>
                <p>MANGA</p>
            </a>
        </div>
        <div class="search-bar">
            <input class="input" type="text" placeholder="Rechercher...">
            <a href="">
                <div class="button-search">
                    <i class="fa-solid fa-magnifying-glass white"></i>
                </div>
            </a>
        </div>
    </div>
</header><?php

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
</section><footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer></body>
</html>
