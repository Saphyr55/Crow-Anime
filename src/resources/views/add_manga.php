<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src="<?= $url_image ?>">
    </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="title_en" placeholder="<?= $name_english ?>" value="<?= $title_en ?>"><br>
            <input type="text" name="title_ja" placeholder="<?= $name_japanese ?>" value="<?= $title_ja ?>"><br>
            <div class="year-season">
                <label><?= $year ?></label>
                <input name="date" type="date" value="<?= $date ?>"/>
            </div>
            <br>
            <div>
                <input class="input-pa" type="text" name="publishing_house" id="" placeholder="<?= $_publishing_house ?>"
                       value="<?= $publishing_house ?>">
                <input class="input-pa" type="text" name="authors" id="" placeholder="<?= $_authors ?>" value="<?= $authors ?>">
            </div>
            <br>
            <div>
                <textarea class="anime-synopsis" name="manga_synopsis" placeholder="Synopsis" required><?= "$manga_synopsis" ?></textarea>
            </div>
            <br>
            <div class="choose-picture">
                <label><?= $choose_picture ?></label><br>
                <input type="file" id="anime-picture" name="manga_picture" accept="image/png, image/jpeg">
            </div>
            <div>
                <label for="finish"><?= $is_finish ?></label>
                <input type="checkbox" name="finish" id="is_finish_anime"><br>
                <label for="volumes"><?= $_volumes ?></label>
                <input type="checkbox" name="unknow_volumes"
                       onchange="document.getElementById('volumes').disabled = this.checked;" id="">
                <input type="number" name="volumes" value="<?= $volumes ?>" id="volumes">
            </div>
            <br>
            <div>
                <button class="preview-anime" type="submit" name="preview"><?= $preview ?></button>
                <br>
                <button class="submit-button" type="submit" name="submit"><?= $register ?></button>
            </div>
        </form>
    </div>
</section>