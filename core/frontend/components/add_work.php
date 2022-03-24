<?php

use Work\Season;

require_once $_SERVER["DOCUMENT_ROOT"].'/core/backend/head.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/core/backend/work/Season.php';
require_once $_SERVER["DOCUMENT_ROOT"]."/core/backend/form.php";

?>
<body>
    <section>
        <form action="" method="post">
            <input type="text" name="name_anime_en" value="" placeholder="Nom de l'anime anglais"><br>
            <input type="text" name="name_anime_ja" placeholder="Nom de l'anime japonais"><br>
            <textarea name="synopsis_anime" id="" cols="30" rows="10"></textarea><br>
            <select name="season_anime" id="">
                <option value="<?=Season::SPRING?>">Spring</option>
                <option value="<?=Season::SUMMER?>">Summer</option>
                <option value="<?=Season::FALL?>">Fall</option>
                <option value="<?=Season::WINTER?>">Winter</option>
            </select>
            <br>
            <label for="is_finish_anime">Est-il fini ?</label>
            <input type="checkbox" name="is_finish_anime" id="is_finish_anime">
            <br>
            <button type="submit" name="submit">Enregistrer l'anime</button>
            <img src=<?= ($anime !== null) ? $anime->getUrlImageWork54x71() : '' ?>>
        </form>
    </section>
</body>
</html>