<?php

use CrowAnime\Database\Database;
use CrowAnime\Core\User;
use DateTime;

$error = "";

if (!empty($_POST)) {
	if (
		isset($_POST['username']) &&
		!empty($_POST['username']) &&
		isset($_POST['password']) &&
		!empty($_POST['password'])
	) {
		$username = htmlspecialchars($_POST['username']);
		$user = Database::getDatabase()->execute(
			"SELECT * FROM _user 
			 WHERE username=:username",
			[
				'username' => $username,
			]
		);
		if ($user !== []) {
			$user = $user[0];
			if (password_verify(htmlspecialchars($_POST['password']), $user['password'])) {
				$user = new User(
					$user['id_user'],
					$user['username'],
					$user['email'],
					$user['password'],
					$user['is_admin'],
					new DateTime(),
					new DateTIme()#date_create_from_format("Y-m-d H:i:s", $user['user_date'])
				);
				$_SESSION['user'] = $user;
				header("Location: http://$_SERVER[HTTP_HOST]/profile/" . $user->getUsername());
			} else $error = "Pseuso ou mot de passe invalide";
		} else $error = "Pseuso ou mot de passe invalide";
	} else $error = "Veuillez remplir les champs";
}

?>
<section id="section">
	<form action="" method="POST">
		<h1>Se connecter</h1>
		<div class="inputs">
			<input name="username" type="email ou Username" placeholder="Nom d'utilisateur" pattern="[A-Za-z0-9_]{2,16}" required />
			<input name="password" type="password" value="" id="motdepasse" placeholder="Mot de passe">
		</div>
		<div align="center">
			<a href=<?= "http://$_SERVER[HTTP_HOST]/signup" ?>>
				<p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span>crée</span> un.</p>
			</a>
			<button type="submit">Se connecter</button>
			<p class="error-message"><?= $error ?></p>
		</div>
	</form>
</section>