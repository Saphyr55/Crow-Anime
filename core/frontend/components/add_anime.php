<?php

use Work\Season;

require_once $_SERVER["DOCUMENT_ROOT"].'/core/backend/head.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/core/backend/work/Season.php';
#require_once $_SERVER["DOCUMENT_ROOT"]."/core/backend/form.php";

?>
<head>
    <link rel="stylesheet" href="/core/frontend/css/add_anime.css">
</head>
<body>
    <?php require $_SERVER["DOCUMENT_ROOT"].'/core/frontend/components/header.php' ?>
    <section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src=<?= ($anime !== null) ? $anime->getUrlImageWork54x71() : "/assets/img/not_found.png" ?>>
        <p>NAME ANIME JA</p>
        <p>NAME ANIME EN</p>
    </div>
    <div class="form">
        <form action="" method="post">
            <input type="text" name="name_anime_en" value="" placeholder="Nom de l'anime anglais"><br>
            <input type="text" name="name_anime_ja" placeholder="Nom de l'anime japonais"><br>            
            <span>
                <label for="year">Année :</label>
                <select id="year" name="year">
                    <?php
                    for ($i=1990; $i <= date('Y'); $i++) { 
                        echo "<option value=\"date_$i\" >$i</option>";
                    }
                    ?>
                </select>
                <select name="season_anime" id="">
                    <option value="<?=Season::SPRING?>">Spring</option>
                    <option value="<?=Season::SUMMER?>">Summer</option>
                    <option value="<?=Season::FALL?>">Fall</option>
                    <option value="<?=Season::WINTER?>">Winter</option>
                </select>
            </span>
            <br>
            <label for="is_finish_anime">Est-il fini ?</label>
            <input type="checkbox" name="is_finish_anime" id="is_finish_anime">
            <br>
            <button type="submit" name="submit">Enregistrer l'anime</button>
        </form>
    </div>
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/core/frontend/components/footer.php" ?>
</body>
</html>