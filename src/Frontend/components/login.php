<section id="section">
  <form>
    <h1>Se connecter</h1>
    <!--
    <div class="social-media">
      <p><i class="fab fa-google"></i></p>
      <p><i class="fab fa-youtube"></i></p>
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
    </div>
    <p class="choose-email">ou utiliser mon adresse e-mail :</p>
  -->

    <div class="inputs">
      <input type="email ou Username" placeholder="Email ou Username" pattern="[A-Za-z0-9_]{2,16}" or pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
      <input type="password" value="" id="motdepasse" placeholder="Mot de passe">
    </div>
    <div align="center">
      <a href=<?= "http://$_SERVER[HTTP_HOST]/signup" ?>>
        <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span>crée</span> un.</p>
      </a>
      <button type="submit">Se connecter</button>
    </div>
  </form>
</section>