<main>
    <div class="top-main">
        <p>Les news</p>
        <?php if ($current_user_is_admin()) : ?>
        <div>
            <a onclick="displayOnClickByIdName('add-news')" ><i id="i-cross-switch" class="fa-solid fa-plus"></i></a>
            <div id="add-news" class="add-news" style="display: none">
                <p class="title-form">Formulaire d'ajout de news</p>
                <form action="" method="POST">
                    <div>
                        <label for="news_img">
                            <input name="news_img" type="file">
                        </label>
                        <p></p>
                        <label for=""><textarea name="" id="" cols="30" rows="10"></textarea></label>
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php for($i = 0 ; $i < 5 ; $i++) : ?>
    <div class="news">
        <img src="/assets/img/not_found.png" alt="">
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
        <p>Publishing by </p>
    </div>
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