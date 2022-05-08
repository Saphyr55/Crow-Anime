<main>
    <div class="admin-buttons">
        <div class="admin-button-add">
            <a href=<?= "/admin/". $current_user()->getUsername() ."/add-anime" ?>>
                <p>Nouvel anime</p>
            </a>
        </div>
        <div class="admin-button-add">
            <a href=<?= "/admin/". $current_user()->getUsername() ."/add-manga" ?>>
                <p>Nouveau manga</p>
            </a>
        </div>
        <div class="admin-button-add">
            <a href=<?= "/admin/". $current_user()->getUsername() ."/add-character" ?>>
                <p>Nouveau character</p>
            </a>
        </div>
    </div>
    <div class="all-users">
        <input placeholder="Search Users" type="text">
            <div>
                <p>Nom User</p>
                <button>Supprimer</button>
            </div>
            <div>
                <p>Nom User</p>
                <button>Supprimer</button>
            </div>
            <div>
                <p>Nom User</p>
                <button>Supprimer</button>
            </div>
            <div>
                <p>Nom User</p>
                <button>Supprimer</button>
            </div>
            <div>
                <p>Nom User</p>
                <button>Supprimer</button>
            </div>
    </div>
</main>