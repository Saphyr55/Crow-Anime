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

use CrowAnime\Backend\Database\Database;
use CrowAnime\Backend\Form\Form;
use CrowAnime\Backend\Work\Anime;
use CrowAnime\Backend\Work\AnimeForm;
use CrowAnime\Backend\Work\Season; 

$datas = [
    "anime_title_en" => htmlspecialchars($_POST['title_en']),
    "anime_title_ja" => htmlspecialchars($_POST['title_ja']),
    "anime_season" => htmlspecialchars($_POST['season_anime']),
    "anime_date" => htmlspecialchars($_POST['date']),
    "anime_studio" => htmlspecialchars($_POST['studio']),
    "anime_finish" => (htmlspecialchars($_POST['finish']) === "on" ) ? 1 : 0
];

if (Form::check($datas)) {
    $anime = (new AnimeForm($datas))->createAnime();
    if (isset($_POST['submit'])) {
        $anime->sendDatabase();
        // recupere le dernier enregistrement
        $last_anime = (array) Database::getDatabase()->query("SELECT * FROM anime ORDER BY id_anime DESC")[0]; 
    }
    
    var_dump($_FILES['anime_picture']);
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
    $uploaddir = getcwd().DIRECTORY_SEPARATOR;
    $uploadfile = $uploaddir . basename($_FILES['anime_picture']['name']);
    move_uploaded_file($_FILES['anime_picture']["tmp_name"], $uploadfile);
    
    //$da = "$last_anime[id_anime]_$last_anime[anime_title_en]"


/*
$id_anime = $last_anime['id_anime']; // recupere id du dernier enregistrement
$anime->setIdWork($id_anime);
$data_json = json_encode(array(
    "id_work" => $id_anime, 
    "name_work" => $last_anime['anime_title_en'],
    "is_anime" => true,
    "is_manga" => false
));
$file_json = fopen($_SERVER['DOCUMENT_ROOT'] . "/assets/data/work.json", "w") 
    or die("Unable to open file!");
fwrite($file_json, $data_json);
fclose($file_json);

$command_py = escapeshellcmd("python3 " . $_SERVER['DOCUMENT_ROOT'] . "/app/python/script.py");
shell_exec($command_py);
*/
}    

?>

<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src=<?= ($anime !== null) ? $anime->getUrlImageWork54x71() : "/assets/img/not_found.png" ?>>
    </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title_en" placeholder="Nom de l'anime anglais" ><br>
            <input type="text" name="title_ja" placeholder="Nom de l'anime japonais" ><br>
            <div class="year-season">
                <label>Année :</label>
                <input name="date" type="date" />
                <select name="season_anime" id="">
                    <option value="<?= Season::SPRING ?>">Spring</option>
                    <option value="<?= Season::SUMMER ?>">Summer</option>
                    <option value="<?= Season::FALL ?>">Fall</option>
                    <option value="<?= Season::WINTER ?>">Winter</option>
                </select>
            </div>
            <br>
            <div>
                <label for="">Studio : </label>
                <input type="text" name="studio" id="">
            </div>
            <br>
            <div class="choose-picture">
                <label>Choose a anime picture : </label><br>
                <label>Auto</label>
                <input type="checkbox" onchange="document.getElementById('anime-picture').disabled = this.checked;" name="auto_picture" id="auto-picture">
                <input type="file" id="anime-picture" name="anime_picture" accept="image/png, image/jpeg">
                <br>
            </div>
            <div>
                <input type="checkbox" name="finish" id="is_finish_anime" >
                <label for="finish">Est-il fini ?</label>
            </div>
            <br>
            <div>
                <button class="preview-anime" type="submit" name="preview">Apercu de l'anime</button>
                <br>
                <button class="submit-button" type="submit" name="submit">Enregistrer l'anime</button>
            </div>
            
        </form>
    </div>
</section><footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer></body>
</html>
