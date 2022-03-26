<form>
  <h1>Inscription</h1>
  <!--
    <div class="social-media">
      <p><i class="fab fa-google"></i></p>
      <p><i class="fab fa-youtube"></i></p>
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
    </div>
    -->
  <div class="inputs">
    <input type="Username" placeholder="Username" minlength="2" maxlength="16" pattern="[A-Za-z0-9_]{2,16}" required />
    <input type="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
    <input type="password" value="" id="motdepasse" placeholder="Password">
    <input type="confirmez password" value="" id="ConfirmezMotdePasse" placeholder="Repeat password">
  </div>
  <div align="center">
    <button type="submit">S'inscrire</button>
    <p>J'ai déjà un <span>compte</span>. Je me <span><a href=<?="http://$_SERVER[HTTP_HOST]/login"?>>connecte</a></span>.</p>
  </div>
</form>