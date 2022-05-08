<div style="margin-top: 100px;" align="center">
    <a href=<?= "/admin/". $current_user()->getUsername() ."/add-anime" ?>>
        <p class="creerAnime">Nouvel anime</p>
    </a>
</div>
<div align="center">
    <a href=<?= "/admin/". $current_user()->getUsername() ."/add-manga" ?>>
        <p class="creerManga">Nouveau manga</p>
    </a>
</div>
<div align="center">
    <a href=<?= "/admin/". $current_user()->getUsername() ."/add-character" ?>>
        <p class="creerManga">Nouveau character</p>
    </a>
</div>
