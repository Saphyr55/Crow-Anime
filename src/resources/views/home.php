<section id="section-left">
    <div class="slideshow-container">
        <h1>Les News</h1>
        <div class="mySlides fade">
            <a href="/news"><img src="/assets/img/not_found.png" style="width:100%" alt=""></a></div>
        <div class="mySlides fade">
            <a href="/news"><img src="/assets/img/not_found.png" style="width:100%" alt=""></a>
        </div>
        <div class="mySlides fade">
            <a href="/news"><img src="/assets/img/distance.jpg" style="width:100%" alt=""></a></div>
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
                    <a href="">
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
            <a href="">
                <?= $best_manga ?>
            </a>
        </p>
        <ol class="season-anime-img" style="list-style-type:none;">
            <?php for ($i = 0; $i < 6; $i++) : ?>
                <li class='anime'>
                    <a href=''>
                        <img class='anime-img' src='/assets/img/not_found.png' alt='' srcset=''>
                        <p class='name-anime'><?= $name_anime ?></p>
                    </a>
                </li>
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