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
        <input id="search-user-input" placeholder="Search Users" type="text">
        <div id="all-users">

        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function request_access($this){
        $(document).ready( function() {
            $.ajax({
                async: false,
                url: '/ajax/ajax',
                type: 'get',
                data: 'user_id=' + $this.id,
                success: function () {
                    window.location.replace(
                        window.location.pathname
                    );
                }
            });
        });
    }

    $(document).ready( function() {
        $('#search-user-input').keyup( function() {

            $('#search-user-input').html('');

            let user = $(this).val();

            $.ajax({
                type: 'GET',
                url: '/ajax/ajax',
                data: 'user=' + encodeURIComponent(user),
                success: function(data) {
                    document.getElementById('all-users').innerHTML = data;
                }
            });
        });
    });
</script>