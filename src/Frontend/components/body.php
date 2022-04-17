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

use CrowAnime\Backend\Work\Manga;

$mangas = [];
$style = "style='border-color: white;'";
$styles = [
    "popular" => "",
    "top" => ""
];

switch ($_GET['type']) {
    case 'popular':
        $mangas = Manga::getMostPopularMangas();
        $styles['popular'] = "style='border-color: white;'";
        break;
    case 'recent_upload':
        $mangas = Manga::recentUpload();
        break;
    default:
        $mangas = Manga::getTopAnimes();
        $styles['top'] = "style='border-color: white;'";
        break;
}

?>
<div class="sort">
    <div class="sort-by">
        <div class="sort-by-alphabet">
            <a href="" class="sort-by-alphabet-All">Tout</a> <a href="" class="sort-by-alphabet-#">#</a>
            <a href="" class="sort-by-alphabet-A">A</a> <a href="" class="sort-by-alphabet-B">B</a>
            <a href="" class="sort-by-alphabet-C">C</a> <a href="" class="sort-by-alphabet-D">D</a>
            <a href="" class="sort-by-alphabet-E">E</a> <a href="" class="sort-by-alphabet-F">F</a>
            <a href="" class="sort-by-alphabet-G">G</a> <a href="" class="sort-by-alphabet-H">H</a>
            <a href="" class="sort-by-alphabet-I">I</a> <a href="" class="sort-by-alphabet-J">J</a>
            <a href="" class="sort-by-alphabet-K">K</a> <a href="" class="sort-by-alphabet-L">L</a>
        </div>
        <div class="sort-by-alphabet">
            <a href="" class="sort-by-alphabet-M">M</a> <a href="" class="sort-by-alphabet-N">N</a>
            <a href="" class="sort-by-alphabet-O">O</a> <a href="" class="sort-by-alphabet-P">P</a>
            <a href="" class="sort-by-alphabet-Q">Q</a> <a href="" class="sort-by-alphabet-R">R</a>
            <a href="" class="sort-by-alphabet-S">S</a> <a href="" class="sort-by-alphabet-T">T</a>
            <a href="" class="sort-by-alphabet-U">U</a> <a href="" class="sort-by-alphabet-V">V</a>
            <a href="" class="sort-by-alphabet-X">W</a> <a href="" class="sort-by-alphabet-X">X</a>
            <a href="" class="sort-by-alphabet-Y">Y</a> <a href="" class="sort-by-alphabet-Z">Z</a>
        </div>
    </div>
</div>

<div class="list">
    <div class="list-top-name">
        <a href="<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>">
            <p <?= $styles['top'] ?> class="list-top-name-p">Top Mangas</p>
        </a>
        <a href="<?= "http://$_SERVER[HTTP_HOST]/mangas?type=popular" ?>">
            <p <?= $styles['popular'] ?> class="list-top-name-p">Most Popular</p>
        </a>
    </div>
    <div class="list-container">
        <div class="list-items">
            <?php for ($i = 0; $i < 20; $i++) : ?>
                <a href="" class="list-item">
                    <?php if ($i <= (count($mangas) - 1)) : ?>
                        <img class="list-item-filter" src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $mangas[$i]->getIdWork() . '.jpg' ?>">
                    <?php endif; ?>
                    <div class="list-item-desc">
                        <?= ($i <= count($mangas) - 1) ? $mangas[$i]->getTitle_ja() : "Manga Title" ?>
                    </div>
                </a>
            <?php endfor; ?>
        </div>
    </div>
</div><footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer></body>
</html>
