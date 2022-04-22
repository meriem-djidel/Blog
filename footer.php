<div class="footerImg">
  <img src="css/logometa.png">
</div>
<footer>
  <nav align="center">
    <a href="index.php">Accueil || </a></li>
    <a href="articles.php">Les articles || </a></li>
    <?php

    if (isset($_SESSION['login']) == "administrateur") {
      echo ' <a href="deco.php">Déconnecter || </a>
                         <a href="profil.php">Profil || </a>';
    } else {
      echo '<a href="connexion.php">Connexion || </a>
                        <a href="inscription.php">Inscription || </a>';
    }
    if (isset($_SESSION['login']) == "administrateur" || isset($_SESSION['login']) == "modérateur") {
      echo '<a href="admin.php">Admin || </a>';
      echo '<a href="cree_article.php">Créer un article</a>';
    }

    ?>

    </div>
  </nav>
</footer>
</body>

</html>