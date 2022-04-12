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
            $username = $_SESSION['user']->getUsername();
            echo '
            <div class="profil">
                <div class="div-profile">
                    <a class="" onclick="displayScrollMenuOnClick()">
                 <i class="fa-solid fa-bars white"></i>
               <p class="p-profile">' . $_SESSION['user']->getUsername() . '</p>
             </a>
            <div id="scroll-menu" class="scroll-menu">
            <ul>
                <li>
                   <a href=' . "http://$_SERVER[HTTP_HOST]/profile/" . $username . ' class="white"><i class="fa-solid fa-user"></i>
                     <p>Profile</p>
                   </a>
               </li>';
            if ($_SESSION['user']->isAdmin()) {
                echo '
              <li>
                 <a href=' . "http://$_SERVER[HTTP_HOST]/admin/" . $username . ' class="white"><i class="fa-solid fa-hammer"></i>
                    <p>Admin</p>
                </a>
              </li>';
            }
            echo '
            <li>
                <a href=' . "http://$_SERVER[HTTP_HOST]/profile/" . $username . "/animeslist" . ' class="white"><i class="fa-solid fa-book"></i>
                    <p>List Animes</p>
                </a>
            </li>
            <li>
                <a href=' . "http://$_SERVER[HTTP_HOST]/profile/" . $username . "/mangaslist" . ' class="white"><i class="fa-solid fa-book"></i>
                    <p>List Mangas</p>
                </a>
            </li>
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
</header><?php

use CrowAnime\Backend\Database;
use CrowAnime\Backend\Work\Anime;
use CrowAnime\Backend\Work\Season; 

/**
$title_en     =  htmlentities(htmlspecialchars($_POST['name_anime_en']));
$title_ja     =  htmlentities(htmlspecialchars($_POST['name_anime_ja']));
if (!isset($_POST['is_finish_anime']))
    $is_finish = 0;
else
    $is_finish  =  boolval($_POST['is_finish_anime']);
$season_anime   =  htmlspecialchars(htmlentities($_POST['season_anime']));
$synopsis_anime = htmlspecialchars(htmlentities($_POST["synopsis_anime"]));

if (
    isset($title_en) and isset($title_ja) and
    isset($is_finish) and isset($season_anime) and
    isset($synopsis_anime)
) {

    $anime = Anime::build(
        $title_en,
        $title_ja,
        $is_finish, # construction de l'anime
        $synopsis_anime,
        $season_anime
    );
    $anime->put_in_database(); # envoi l'objet dans la database

    $data = Database::getDatabase()->lastRegister('anime', 'id_anime'); // recupere le dernier enregistrement
    $id_anime = intval(((array) $data[0])['id_anime']); // recupere id du dernier enregistrement
    $anime->setIdWork($id_anime);
    $name_work = ((array) $data[0])['anime_title_en'];
    $data_json = json_encode(array(
        "id_work" => $id_anime,
        "name_work" => $name_work,
        "is_anime" => true,
        "is_manga" => false
    ));
    $file_json = fopen($_SERVER['DOCUMENT_ROOT'] . "/assets/data/work.json", "w")
        or die("Unable to open file!");
    fwrite($file_json, $data_json);
    fclose($file_json);

    $command_py = escapeshellcmd("python3 " . $_SERVER['DOCUMENT_ROOT'] . "/app/python/script.py");
    shell_exec($command_py);
}

*/
?>

<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src=<?= ($anime !== null) ? $anime->getUrlImageWork54x71() : "/assets/img/not_found.png" ?>>
    </div>
    <div class="form">
        <form action="" method="post">
            <input type="text" name="name_anime_en" value="" placeholder="Nom de l'anime anglais"><br>
            <input type="text" name="name_anime_ja" placeholder="Nom de l'anime japonais"><br>
            <span>
                <label for="year">Année :</label>
                <select id="year" name="year">
                    <?php
                    for ($i = 1990; $i <= date('Y'); $i++) {
                        echo "<option value=\"date_$i\" >$i</option>";
                    }
                    ?>
                </select>
                <select name="season_anime" id="">
                    <option value="<?= Season::SPRING ?>">Spring</option>
                    <option value="<?= Season::SUMMER ?>">Summer</option>
                    <option value="<?= Season::FALL ?>">Fall</option>
                    <option value="<?= Season::WINTER ?>">Winter</option>
                </select>
            </span>
            <br>
            <label for="is_finish_anime">Est-il fini ?</label>
            <input type="checkbox" name="is_finish_anime" id="is_finish_anime">
            <br>
            <textarea name="synopsis" id="" cols="30" rows="10"></textarea>
            <button type="submit" name="submit">Enregistrer l'anime</button>
        </form>
    </div>
</section><footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer></body>
</html>
