<section id="section-left">
    <div class="slideshow-container">
        <a href="/news"><h1>Les News</h1></a>
        <?php for ($i = 0; $i < 3 ; $i++) : ?>
            <?php if(count($all_news) > $i) : ?>
            <div class="mySlides fade">
                <iframe src="<?= $all_news[$i]->getNewsURLVideo() ?>" style="width:100%"  frameborder="0" allowfullscreen></iframe>
            </div>
            <?php endif; ?>
        <?php endfor; ?>
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <div class="season-anime">
        <p class="p-anime">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/animes?type=seasonal" ?>">
                <?= $anime_season ?> <?= $actual_date ?> Anime
            </a>
        </p>
        <ol class="season-anime-img" style="list-style-type:none;">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <li class="anime">
                    <a href="<?= "http://$_SERVER[HTTP_HOST]/anime/".$animes[$i]->getIdWork()?>">
                        <img class="anime-img"
                             src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/anime/" . $animes[$i]->getIdWork() . '.jpg' ?>"
                             alt="" srcset="">
                        <p class="name-anime">
                            <?= $animes[$i]->getTitle_ja() ?>
                        </p>
                    </a>
                </li>
            <?php endfor; ?>
        </ol>
    </div>
    <div class="season-anime">
        <p class="p-anime">
            <a href="<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>">
                <?= $best_manga ?>
            </a>
        </p>
        <ol class="season-anime-img" style="list-style-type:none;">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <?php if($i < count($top_mangas)) : ?>
                <li class="anime">
                    <a href="<?= "http://$_SERVER[HTTP_HOST]/manga/".$top_mangas[$i]->getIdWork() ?>">
                        <img class="anime-img"
                             src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $top_mangas[$i]->getIdWork() . '.jpg' ?>"
                             alt=""
                             srcset="">
                        <p class="name-anime"><?= $top_mangas[$i]->getTitle_ja() ?></p>
                    </a>
                </li>
                <?php endif; ?>
            <?php endfor; ?>
        </ol>
    </div>
</section>
<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }
</script>