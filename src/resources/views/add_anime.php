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
                <select name="season_anime" id="">
                    <option value="<?= $spring ?>">Spring</option>
                    <option value="<?= $summer ?>">Summer</option>
                    <option value="<?= $fall ?>">Fall</option>
                    <option value="<?= $winter ?>">Winter</option>
                </select>
            </div>
            <br>
            <div>
                <textarea class="anime-synopsis" name="anime_synopsis" placeholder="Synopsis" required><?= $anime_synopsis ?></textarea>
            </div>
            <br>
            <div>
                <input type="text" name="studio" placeholder="<?= $_studio ?>" id="" value="<?= $studio ?>">
            </div>
            <br>
            <div class="choose-picture">
                <label><?= $choose_picture ?>></label><br>
                <input type="file" id="anime-picture" name="anime_picture" accept="image/png, image/jpeg">
            </div>
            <br>
            <div>
                <input type="checkbox" name="finish" id="is_finish_anime">
                <label for="finish"><?= $is_finish ?></label>
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