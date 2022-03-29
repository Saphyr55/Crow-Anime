<body>
<header id="header">
    <div class="top-header">
        <div class=''>
            <a href=<?= "http://$_SERVER[HTTP_HOST]/home" ?>>
                <img class='logo' src='/assets/img/not_found.png' alt='' srcset=''>
            </a>
        </div>
        <?php
        if (!isset($_SESSION['user'])) {
            echo "
            <div class='profile profil'>
                <a href='http://$_SERVER[HTTP_HOST]/login'>
                    <p class='connected'>SE CONNECTER</p>
                </a>
                <a href='http://$_SERVER[HTTP_HOST]/signup'>
                    <p>S'ENREGISTER</p>
                </a>
            </div>";
        } else {
            $username = $_SESSION['user']->getUsername();
            echo '
            <div class="profil">
                <div class="div-profile">
                    <a class="" onclick="displayScrollMenuOnClick()">
                 <i class="fa-solid fa-bars white"></i>
               <p class="p-profile">' . $_SESSION['user']->getUsername() . '</p>
             </a>
            <div id="scroll-menu" class="scroll-menu">
            <ul>
                <li>
                   <a href=' . "http://$_SERVER[HTTP_HOST]/profile/" . $username . ' class="white"><i class="fa-solid fa-user"></i>
                     <p>Profile</p>
                   </a>
               </li>';
            if ($_SESSION['user']->isAdmin()) {
                echo '
              <li>
                 <a href=' . "http://$_SERVER[HTTP_HOST]/profile/" . $username . "/admin" . ' class="white"><i class="fa-solid fa-hammer"></i>
                    <p>Admin</p>
                </a>
              </li>';
            }
            echo '
            <li>
                <a href=' . "http://$_SERVER[HTTP_HOST]/profile/" . $username . "/animeslist" . ' class="white"><i class="fa-solid fa-book"></i>
                    <p>List Animes</p>
                </a>
            </li>
            <li>
                <a href=' . "http://$_SERVER[HTTP_HOST]/profile/" . $username . "/mangaslist" . ' class="white"><i class="fa-solid fa-book"></i>
                    <p>List Mangas</p>
                </a>
            </li>
            <li>
                <a href=' . "http://$_SERVER[HTTP_HOST]/logout" . ' class="white"><i class="fa-solid fa-right-from-bracket"></i>
                    <p>Lougout</p>
                </a>
            </li>
            </ul>
            </div>
                </div>
            </div>';
        }
        ?>
    </div>
    <script>
        function displayScrollMenuOnClick() {
            var div = document.getElementById('scroll-menu');
            if (!div.style.display || div.style.display === 'block')
                div.style.display = 'none';
            else
                div.style.display = 'block';
        }
    </script>
    <div class="bottom-header">
        <div>
            <a href=<?= "http://$_SERVER[HTTP_HOST]/animes" ?>>
                <p>ANIME</p>
            </a>
            <a href=<?= "http://$_SERVER[HTTP_HOST]/mangas" ?>>
                <p>MANGA</p>
            </a>
        </div>
        <div class="search-bar">
            <input class="input" type="text" placeholder="Rechercher...">
            <a href="">
                <div class="button-search">
                    <i class="fa-solid fa-magnifying-glass white"></i>
                </div>
            </a>
        </div>
    </div>
</header><?php

use CrowAnime\Backend\Database;
use CrowAnime\Backend\User;
use DateTime;

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
					date_create_from_format("Y-m-d H:i:s", $user['user_date'])
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
</section><footer id="footer">
        <a href="">&copy; 2022 CROW ANIME, OFFICIAL SITE</a>
</footer></body>
</html>
