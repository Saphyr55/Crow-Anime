<!DOCTYPE html>
<html lang=''>
<head>
<meta charset='UTF-8'>
<meta http-equiv='refresh'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<script src='https://kit.fontawesome.com/909d9d481e.js' crossorigin='anonymous'></script>
<title>Home</title>
</head>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/header.css'>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/footer.css'>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/home.css'>
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
<body>
    <section id="section-left">
        <div class="news">
            <a href="" class="angle angle-left"><i class="fa-solid fa-angle-left"></i></a>
            <a href=""><img class="img-news" src="/assets/img/not_found.png" alt="" srcset=""></a>
            <a href="" class="angle angle-right"><i class="fa-solid fa-angle-right"></i></a>
        </div>
        <div class="season-anime">
            <p class="p-anime">
                <a href="">
                    ANIME DE SAISON
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
<footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer>

</body>
</html>
