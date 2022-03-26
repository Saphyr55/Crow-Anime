<section>
    <div class="viewed-anime">
        <p class="p-anime">
            <a href="">
                Manga lus
            </a>
        </p>
        <ul class="viewed-anime-img">
            <?php
            for ($i = 0; $i < 50; $i++) {
                echo '
                <li class="anime">
                    <a href="">
                        <img class="anime-img" src="not_found.png" alt="" srcset="">
                        <p class="name-anime">Name manga</p>
                    </a>            
                </li>
                    ';
            }
            ?>
        </ul>
    </div>
</section>