<body>
    <section>
        <div class="viewed-anime">
            <p class="p-anime">
                <a href="">
                    Anime vus
                </a>
            </p>
            <ul class="viewed-anime-img">
                <?php 
                for ($i=0; $i < 22 ; $i++) { 
                    echo "
                    <li class='anime'>
                        <a href=''>
                            <img class='anime-img' src='/assets/img/not_found.png' alt='' srcset=''>
                            <p class='name-anime'>Name anime</p>
                        </a>
                    </li>
                    ";
                }
                ?>
            </ul>
        </div>
</body>