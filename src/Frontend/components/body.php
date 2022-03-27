<body>
<?php

use CrowAnime\Backend\Database;
use CrowAnime\Backend\User;

if (isset($_SESSION['user'])) {
    header("Location: http://$_SERVER[HTTP_HOST]/home");
    exit;
}
$error = "";

if (!empty($_POST)) {
    if (
        isset($_POST['username']) &&
        !empty($_POST['username']) &&
        isset($_POST['password']) &&
        !empty($_POST['password']) &&
        isset($_POST['email']) &&
        !empty($_POST['email'])
    ) {
        $username = htmlentities(htmlspecialchars($_POST['username']));
        $email = htmlentities(htmlspecialchars($_POST['email']));
        if (
            htmlentities(htmlspecialchars($_POST['password'])) ===
            htmlentities(htmlspecialchars($_POST['confirm_password']))
        ) {
            $user = Database::getDatabase()->execute(
                "SELECT * FROM _user 
			    WHERE username=:username
			    AND email=:email",
                [
                    'username' => $username,
                    'email' => $email
                ]
            );
            if ($user === []) {
                $user = $user[0];
                Database::getDatabase()->execute(
                    'INSERT INTO _user (username, password, email) 
                     VALUES (:username, :password, :email)',
                    [
                        ":username" => $username,
                        ":password" => password_hash(htmlentities(htmlspecialchars($_POST['password'])), PASSWORD_DEFAULT),
                        ":email" => $email
                    ]
                );
                header("Location: http://$_SERVER[HTTP_HOST]/login");
            } else $error = "Username ou email déjà utiliser";
        } else $error = "Mot de passe non conrespondant";
    } else $error = "Veuillez remplir les champs";
}

?>
<form method="POST">
    <h1>Inscription</h1>
    <div class="inputs">
        <input name="username" type="Username" placeholder="Username" minlength="2" maxlength="16" pattern="[A-Za-z0-9_]{2,16}" required />
        <input name="email" type="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
        <input name="password" type="password" value="" id="motdepasse" placeholder="Password">
        <input name="confirm_password" type="password" value="" id="ConfirmezMotdePasse" placeholder="Repeat password">
    </div>
    <div align="center">
        <button type="submit">S'inscrire</button>
        <p>J'ai déjà un <span>compte</span>. Je me <span><a href=<?= "http://$_SERVER[HTTP_HOST]/login" ?>>connecte</a></span>.</p>
        <p><?= $error ?></p>
    </div>
</form></body>
</html>
