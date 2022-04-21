<form method="POST">
    <h1><?= $inscription ?></h1>
    <div class="inputs">
        <input name="username" type="Username" placeholder="<?= $username ?>" minlength="2" maxlength="16"
               pattern="[A-Za-z0-9_]{2,16}" required/>
        <input name="email" type="email" placeholder="<?= $email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
               required/>
        <input name="password" type="password" value="" id="motdepasse" placeholder="<?= $password ?>">
        <input name="confirm_password" type="password" value="" id="ConfirmezMotdePasse" placeholder="<?= $repeat_password ?>">
    </div>
    <div align="center">
        <button name="register" type="submit"><?= $signup ?></button>
        <p>I have already an <span>account</span>. I <span><a href=<?= "http://$_SERVER[HTTP_HOST]/login" ?>>log in</a></span>.
        </p>
        <p><?= $error ?></p>
    </div>
</form>