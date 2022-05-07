<section class="add-anime">
    <div class="presentation">
        <img id="img_anime" src="<?= $url_image ?>" alt="">
    </div>
    <div class="form">
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <input class="input_area" type="text" name="name_character" placeholder="Nom du personnage" value="<?= $name_character ?>" required>
            </div>
            <br>
            <div class="choose-picture">
                <label><?= "Choisie un image"?></label><br>
                <input type="file" id="picture_select" name="character_picture" accept="image/png, image/jpeg" required>
            </div>
            <br>
            <div>
                <textarea id="input_area" class="anime-synopsis" name="character_description" placeholder="Description" required><?= $character_description ?></textarea>
            </div>
            <p><?= $msg?></p><br>
            <div>
                <div class="buttons">
                    <button class="submit-button" type="submit" name="submit_character"><?= "Register Character" ?></button>
                </div>
            </div>
        </form>
    </div>
</section>