<nav class="nav">
  <i class="uil uil-bars navOpenBtn"></i>
  <a href="#" class="logo"></a>

  <ul class="nav-links">
    <i class="uil uil-times navCloseBtn"></i>
    <li><a href="index.php?page=index">Accueil</a></li>
    <li><a href="index.php?page=inscription">S'inscrire à un sport</a></li>
    <li><a href="index.php?page=contact">Contact</a></li>

    <?php if (isset($_SESSION['email'])): ?>
      <li><a href="index.php?page=mes_inscriptions">Mes Inscriptions</a></li>
      <li><a href="index.php?page=compte">Mon profil</a></li>
      <li>
        <button class="deconnexionBtn" onclick="window.location.href='index.php?page=disconnect';">
          Déconnexion
        </button>
      </li>
    <?php else: ?>
      <li>
        <button class="loginBtn" onclick="window.location.href='index.php?page=login';">
          Connexion
        </button>
      </li>
      <li>
        <button class="signUpBtn" onclick="window.location.href='index.php?page=signup';">
          S'inscrire
        </button>
      </li>
    <?php endif; ?>
  </ul>
</nav>

