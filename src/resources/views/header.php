<header id="header">
    <div class="top-header">
        <div class="">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/home" ?>">
                <img class='logo' src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/logo.png" ?>" alt="" srcset="">
            </a>
        </div>
        <?php if (!$exist_user) : ?>
            <div class='profile profile-div'>
                <a href="<?= "http://$_SERVER[HTTP_HOST]/login" ?> ">
                    <p class='connected'><?= $login ?></p>
                </a>
                <a href="<?= "http://$_SERVER[HTTP_HOST]/signup" ?> ">
                    <p><?= $signup ?></p>
                </a>
            </div>
        <?php else : ?>
            <div class="profile-div">
                <div class="div-profile">
                    <a class="" onclick="displayScrollMenuOnClick()">
                        <i class="fa-solid fa-bars white"></i>
                    </a>
                    <div id="scroll-menu" class="scroll-menu">
                        <ul>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/profile/" . $header_username ?>" class="white"><i
                                            class="fa-solid fa-user"></i>
                                    <p><?= $profile ?></p>
                                </a>
                            </li>
                            <?php if ($is_admin) : ?>
                                <li>
                                    <a href="<?= "http://$_SERVER[HTTP_HOST]/admin/" . $header_username ?>" class="white"><i
                                                class="fa-solid fa-hammer"></i>
                                        <p><?= $admin ?></p>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/profile/" . $header_username . "/animes" ?>"
                                   class="white"><i class="fa-solid fa-book"></i>
                                    <p><?= $list_anime ?></p>
                                </a>
                            </li>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/profile/" . $header_username . "/mangas" ?>"
                                   class="white"><i class="fa-solid fa-book"></i>
                                    <p><?= $list_manga ?></p>
                                </a>
                            </li>
                            <li>
                                <a href="<?= "http://$_SERVER[HTTP_HOST]/logout" ?>" class="white"><i
                                            class="fa-solid fa-right-from-bracket"></i>
                                    <p><?= $logout ?></p>
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
    <div class="bottom-header">
            <nav>
                <a class="f-a-nav-bottom-header" href=<?= "http://$_SERVER[HTTP_HOST]/animes" ?>>
                    <p><?= $anime ?></p>
                </a>
                <a href=<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>>
                    <p><?= $manga ?></p>
                </a>
            </nav>
            <div class="all-search-bar">
                <input class="search-bar input" type="text" placeholder="<?= $search ?>">
                <a href="">
                    <i class="fa-solid fa-magnifying-glass white"></i>
                </a>
            </div>
            <div class="dropdown">
<<<<<<< HEAD
                <div class="dropdown">
                    <button class="drop-btn"><?= $current_language ?></button>
                    <div class="dropdown-content">
                        <a href="?lang=fr">FR</a>
                        <a href="?lang=en">EN</a>
                    </div>
=======
                <button class="drop-btn"><?= $current_language ?></button>
                <div class="dropdown-content">
                    <a href="?lang=fr">FR</a>
                    <a href="?lang=en">EN</a>
>>>>>>> 07416f507a0800470f753ed0b898004de1789fc6
                </div>
            </div>
        </div>
</header>