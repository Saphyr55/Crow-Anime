<?php

use CrowAnime\Backend\Database;
use CrowAnime\Backend\User;
use DateTime;

if (isset($_SESSION['user'])) {
	header("Location: http://$_SERVER[HTTP_HOST]/home");
	exit;
}

if (!empty($_POST)) {
	if (
		isset($_POST['username']) &&
		!empty($_POST['username']) &&
		isset($_POST['password']) &&
		!empty($_POST['password'])
	) {
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		$user = Database::getDatabase()->execute(
			"SELECT * FROM _user 
			 WHERE username=:username
			 AND password=:password",
			[
				'username' => $username,
				'password' => $password
			]
		);
		if ($user !== []) {
			$user = $user[0];
			$user = new User(
				$user['id_user'],
				$user['username'],
				$user['email'],
				$user['password'],
				$user['is_admin'],
				new DateTime(),
				date_create_from_format("Y-m-d", $user['user_date'])
			);
			$_SESSION['user'] = $user;
			header("Location: http://$_SERVER[HTTP_HOST]/profile/" . $user->getUsername());
		}
	}
}

?>
<section id="section">
	<form action="" method="POST">
		<h1>Se connecter</h1>
		<div class="inputs">
			<input name="username" type="email ou Username" placeholder="Username" pattern="[A-Za-z0-9_]{2,16}" or pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
			<input name="password" type="password" value="" id="motdepasse" placeholder="Mot de passe">
		</div>
		<div align="center">
			<a href=<?= "http://$_SERVER[HTTP_HOST]/signup" ?>>
				<p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span>crée</span> un.</p>
			</a>
			<button type="submit">Se connecter</button>
		</div>
	</form>
</section>