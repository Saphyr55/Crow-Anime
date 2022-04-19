<div class="sort">
    <div class="sort-by">
        <div class="sort-by-alphabet">
            <a href="" class="sort-by-alphabet-All">Tout</a> <a href="" class="sort-by-alphabet-#">#</a>
            <a href="" class="sort-by-alphabet-A">A</a> <a href="" class="sort-by-alphabet-B">B</a>
            <a href="" class="sort-by-alphabet-C">C</a> <a href="" class="sort-by-alphabet-D">D</a>
            <a href="" class="sort-by-alphabet-E">E</a> <a href="" class="sort-by-alphabet-F">F</a>
            <a href="" class="sort-by-alphabet-G">G</a> <a href="" class="sort-by-alphabet-H">H</a>
            <a href="" class="sort-by-alphabet-I">I</a> <a href="" class="sort-by-alphabet-J">J</a>
            <a href="" class="sort-by-alphabet-K">K</a> <a href="" class="sort-by-alphabet-L">L</a>
        </div>
        <div class="sort-by-alphabet">
            <a href="" class="sort-by-alphabet-M">M</a> <a href="" class="sort-by-alphabet-N">N</a>
            <a href="" class="sort-by-alphabet-O">O</a> <a href="" class="sort-by-alphabet-P">P</a>
            <a href="" class="sort-by-alphabet-Q">Q</a> <a href="" class="sort-by-alphabet-R">R</a>
            <a href="" class="sort-by-alphabet-S">S</a> <a href="" class="sort-by-alphabet-T">T</a>
            <a href="" class="sort-by-alphabet-U">U</a> <a href="" class="sort-by-alphabet-V">V</a>
            <a href="" class="sort-by-alphabet-X">W</a> <a href="" class="sort-by-alphabet-X">X</a>
            <a href="" class="sort-by-alphabet-Y">Y</a> <a href="" class="sort-by-alphabet-Z">Z</a>
        </div>
    </div>
</div>

<div class="list">
    <div class="list-top-name">
        <p class="list-top-name-p">Mangas vus</p>
    </div>
    <div class="list-container">
        <div class="list-items">
            <?php $mangas = CrowAnime\Core\User::getCurrentUser()->mangasView(); ?>
            <?php if (count($mangas) !== 0) : ?>
                <?php for ($i = 0; $i < count($mangas); $i++) : ?>
                    <a href="" class="list-item">
                        <img class="list-item-filter" src="<?= "http://$_SERVER[HTTP_HOST]/assets/img/manga/" . $mangas[$i]->getIdWork() . '.jpg' ?>">
                        <div class="list-item-desc">
                            <?= $mangas[$i]->getTitle_ja() ?>
                        </div>
                    </a>
                <?php endfor; ?>
            <?php else : ?>
                <p style="margin: 30vh; font-size: 50px; text-align:center;">Vous n'avez enregistrer aucun manga</p>
            <?php endif; ?>
        </div>
        <style>
            .list-top-name {
                width: max-content;
            }
        </style>
    </div>
</div>