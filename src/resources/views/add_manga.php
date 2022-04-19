<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src="<?php
                                    if (isset($_POST['submit'])) echo "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $manga->getIdWork() . '.jpg';
                                    else if (isset($_POST['preview'])) echo "http://$_SERVER[HTTP_HOST]$preview_path_replace";
                                    else echo "http://$_SERVER[HTTP_HOST]/assets/img/not_found.png";
                                    ?>">
    </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title_en" placeholder="Nom du manga anglais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_en']) ?>"><br>
            <input type="text" name="title_ja" placeholder="Nom du manga japonais" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['title_ja']) ?>"><br>
            <div class="year-season">
                <label>Année :</label>
                <input name="date" type="date" value="<?php if ($manage_bool) echo htmlspecialchars(date('Y-m-d', strtotime($_POST['date']))) ?>" />
            </div>
            <br>
            <div>
                <input class="input-pa" type="text" name="publishing_house" id="" placeholder="Publishing house" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['publishing_house']) ?>">
                <input class="input-pa" type="text" name="authors" id="" placeholder="Authors" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['authors']) ?>">
            </div>
            <br>
            <div class="choose-picture">
                <label>Choose a anime picture : </label><br>
                <label>Auto</label>
                <input type="checkbox" onchange="document.getElementById('anime-picture').disabled = this.checked;" name="auto_picture" id="auto-picture">
                <input type="file" id="anime-picture" name="manga_picture" accept="image/png, image/jpeg">
                <br>
            </div>
            <div>
                <label for="finish">Est-il fini ?</label>
                <input type="checkbox" name="finish" id="is_finish_anime"><br>
                <label for="volumes">Nombres de volumes</label>
                <input type="checkbox" name="unknow_volumes" onchange="document.getElementById('volumes').disabled = this.checked;" id="">
                <input type="number" name="volumes" value="<?php if ($manage_bool) echo htmlspecialchars($_POST['volumes']) ?>" id="volumes">
            </div>
            <br>
            <div>
                <button class="preview-anime" type="submit" name="preview">Apercu du manga</button>
                <br>
                <button class="submit-button" type="submit" name="submit">Enregistrer du manga</button>
            </div>

        </form>
    </div>
</section>