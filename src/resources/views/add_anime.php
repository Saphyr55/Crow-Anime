<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src="<?php
                                    if (isset($_POST['submit'])) echo "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $anime->getIdWork() . '.jpg';
                                    else if (isset($_POST['preview'])) echo "http://$_SERVER[HTTP_HOST]$path_replace";
                                    else echo "http://$_SERVER[HTTP_HOST]/assets/img/not_found.png";
                                    ?>">
    </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title_en" placeholder="Nom de l'anime anglais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_en']) ?>"><br>
            <input type="text" name="title_ja" placeholder="Nom de l'anime japonais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_ja']) ?>"><br>
            <div class="year-season">
                <label>Année :</label>
                <input name="date" type="date" value="<?php if ($manage_bool) echo htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))) ?>" />
                <select name="season_anime" id="">
                    <option value="<?= $spring ?>">Spring</option>
                    <option value="<?= $summer ?>">Summer</option>
                    <option value="<?= $fall ?>">Fall</option>
                    <option value="<?= $winter ?>">Winter</option>
                </select>
            </div>
            <br>
            <div>
                <label for="">Studio : </label>
                <input type="text" name="studio" id="" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['studio']) ?>">
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
                <input type="checkbox" name="finish" id="is_finish_anime">
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
</section>