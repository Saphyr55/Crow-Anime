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