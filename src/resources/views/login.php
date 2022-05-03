<section id="section">
    <form class="form-login" action="" method="POST">
        <h1><?= $login ?></h1>
        <div class="inputs">
            <input name="username" type="email ou Username" placeholder="<?= $username ?>" pattern="[A-Za-z0-9_]{2,16}"
                   required>
            <input name="password" type="password" value="" id="motdepasse" placeholder="<?= $password ?>" required>
        </div>
        <div align="center">
            <a href=<?= "http://$_SERVER[HTTP_HOST]/signup" ?>>
                <p class="inscription"><?= $dont_have_account ?></p>
            </a>
            <button name="login" type="submit"><?= $login ?></button>
            <p class="error-message"><?= $error ?></p>
        </div>
    </form>
</section>