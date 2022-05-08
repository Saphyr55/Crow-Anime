<main>
    <div class="admin-buttons">
        <div class="admin-button-add">
            <a href=<?= "/admin/". $current_user()->getUsername() ."/add-anime" ?>>
                <p><?= $new_anime ?></p>
            </a>
        </div>
        <div class="admin-button-add">
            <a href=<?= "/admin/". $current_user()->getUsername() ."/add-manga" ?>>
                <p><?= $new_manga ?></p>
            </a>
        </div>
        <div class="admin-button-add">
            <a href=<?= "/admin/". $current_user()->getUsername() ."/add-character" ?>>
                <p><?= $new_charac ?></p>
            </a>
        </div>
    </div>
    <div class="all-users">
        <input placeholder="<?= $search_user ?>" type="text">
            <div>
                <p>Nom User</p>
                <button><?= $delete ?></button>
            </div>
            <div>
                <p>Nom User</p>
                <button><?= $delete ?></button>
            </div>
            <div>
                <p>Nom User</p>
                <button><?= $delete ?></button>
            </div>
            <div>
                <p>Nom User</p>
                <button><?= $delete ?></button>
            </div>
            <div>
                <p>Nom User</p>
                <button><?= $delete ?></button>
            </div>
    </div>
</main>