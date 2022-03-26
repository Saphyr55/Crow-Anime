<!DOCTYPE html>
<html lang=''>
<head>
<meta charset='UTF-8'>
<meta http-equiv='refresh'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<link rel='icon' type='image/png' sizes='16x16' href='https://cdn-icons-png.flaticon.com/512/3504/3504720.png'>
<script src='https://kit.fontawesome.com/909d9d481e.js' crossorigin='anonymous'></script>
<title> : Anime List</title>
</head>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/header.css'>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/footer.css'>
<link rel='stylesheet' href='http://localhost:5050/src/Frontend/css/profile_animes.css'>
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
    <section>
        <div class="viewed-anime">
            <p class="p-anime">
                <a href="">
                    Anime vus
                </a>
            </p>
            <ul class="viewed-anime-img">
                <?php 
                for ($i=0; $i < 22 ; $i++) { 
                    echo "
                    <li class='anime'>
                        <a href=''>
                            <img class='anime-img' src='/assets/img/not_found.png' alt='' srcset=''>
                            <p class='name-anime'>Name anime</p>
                        </a>
                    </li>
                    ";
                }
                ?>
            </ul>
        </div>
</body>
<footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer>

</body>
</html>
