<body>
<header id="header">
    <div class="top-header">
        <div class=''>
            <a href=<?= "http://$_SERVER[HTTP_HOST]/home" ?>>
                <img class='logo' src='/assets/img/not_found.png' alt='' srcset=''>
            </a>
        </div>
        <?php
        if (!isset($_SESSION['user'])) {
            echo "
            <div class='profile profil'>
                <a href='http://$_SERVER[HTTP_HOST]/login'>
                    <p class='connected'>SE CONNECTER</p>
                </a>
                <a href='http://$_SERVER[HTTP_HOST]/signup'>
                    <p>S'ENREGISTER</p>
                </a>
            </div>";
        } else {
            echo '
            <div class="profil">
                <div class="div-profile">
                    <a class="" onclick="displayScrollMenuOnClick()">
                 <i class="fa-solid fa-bars white"></i>
               <p class="p-profile">Saphyr</p>
             </a>
            <div id="scroll-menu" class="scroll-menu">
            <ul>
                <li>
                   <a href="" class="white"><i class="fa-solid fa-user"></i>
                     <p>Profile</p>
                   </a>
               </li>';
            if ($_SESSION['user']->isAdmin()) {
                echo '
              <li>
                 <a href="" class="white"><i class="fa-solid fa-hammer"></i>
                    <p>Admin</p>
                </a>
              </li>';
            }
            echo '
            <li>
                <a href=' . "http://$_SERVER[HTTP_HOST]/logout" . ' class="white"><i class="fa-solid fa-right-from-bracket"></i>
                    <p>Lougout</p>
                </a>
            </li>
            </ul>
            </div>
                </div>
            </div>';
        }
        ?>
    </div>
    <script>
        function displayScrollMenuOnClick() {
            var div = document.getElementById('scroll-menu');
            if (!div.style.display || div.style.display === 'block')
                div.style.display = 'none';
            else
                div.style.display = 'block';
        }
    </script>
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
</header><body>
    <section id="section-left">
        <div class="news">
            <a class="angle angle-left"><i class="fa-solid fa-angle-left"></i></a>
            <img class="img-news" src="/assets/img/not_found.png" alt="" srcset="">
            <a class="angle angle-right"><i class="fa-solid fa-angle-right"></i></a>
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
</body><footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer></body>
</html>
