<!DOCTYPE html>
<html lang=''>
<head>
<meta charset='UTF-8'>
<meta http-equiv='refresh'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<script src='https://kit.fontawesome.com/909d9d481e.js' crossorigin='anonymous'></script>
<title>All Mangas</title>
</head>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/header.css'>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/footer.css'>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/mangas.css'>
<body>
<header id="header">
    <div class="top-header">
        <div class="">
            <a href=<?= "http://$_SERVER[HTTP_HOST]/home" ?>>
                <img class="logo" src="/assets/img/not_found.png" alt="" srcset="">
            </a>
        </div>
        <div class="profil">
            <a href=<?= "http://$_SERVER[HTTP_HOST]/login" ?>>
                <p class="connected">SE CONNECTER</p>
            </a>
            <a href=<?= "http://$_SERVER[HTTP_HOST]/signup" ?>>
                <p>S'ENREGISTER</p>
            </a>
            <!-- 
                    A afficher quand l'utilisateur est connecté
                    <a href=""><img src="../assets/img/not_found.png" alt="" srcset=""></a>
                    <a href=""><p>Pseudo</p></a>
            -->
        </div>
    </div>
    <div class="bottom-header">
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
</header>
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
    <div class="list-container">
        <div class="list-items">
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>

            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>

            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>
            <a href="" class="list-item">
                <div class="list-item-filter"></div>
                <div class="list-item-desc">Manga Tittle</div>
            </a>

        </div>
    </div>
</div>
<footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer>

</body>
</html>
