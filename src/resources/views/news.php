<main>
    <div class="top-main">
        <p>Les News</p>
        <?php if ($current_user_is_admin()) : ?>
        <div>
            <a onclick="displayOnClickByIdName('add-news')" ><i id="i-cross-switch" class="fa-solid fa-plus"></i></a>
            <div id="add-news" class="add-news" style="display: none">
                <p class="title-form">Formulaire d'ajout de news</p>
                <form action="" method="POST">
                    <div>
                        <label for="news_url">Link video
                            <input name="news_url" type="text" placeholder="https://www.youtube.com/watch?v=XXXXXXX" required>
                        </label>
                        <label for=""><textarea name="news_text" id="" cols="30" rows="10" required>
                                <?= $news_text ?>
                            </textarea>
                        </label>
                        <input type="submit" name="news_submit">
                        <p><?= $error_msg_add_news ?></p>
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php for($i = 0 ; $i < 5 ; $i++) : ?>
        <?php if ( count($all_news) > $i) : ?>
            <div class="news">
                <iframe src="<?= $all_news[$i]->getNewsURLVideo() ?>"  frameborder="0" allowfullscreen></iframe>
                <p><?= $all_news[$i]->getNewsText() ?></p>
            </div>
        <?php endif; ?>
    <?php endfor; ?>
</main>
<script>

    function changeClassByIdName(id, text) {
        document.getElementById(id).className = text;
    }

    function displayOnClickByIdName(name) {
        const div = document.getElementById(name);
        if (!div.style.display || div.style.display === 'block') {
            changeClassByIdName('i-cross-switch', 'fa-solid fa-plus')
            div.style.display = 'none';
        }
        else{
            changeClassByIdName('i-cross-switch', 'fa-solid fa-xmark')
            div.style.display = 'block';
        }
    }
</script>