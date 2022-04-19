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