<?php
session_start();
require 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="script.js"></script>
  <script type="text/javascript"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>
    <?php if (isset($title)) {
      echo $title;
    } else {
      echo "Metaverse";
    } ?>

  </title>
</head>

<body>
  <header> <?php
            $cat = $bdd->query("SELECT * FROM categories WHERE id "); ?>
    <nav class="navigation2">
      <div class="menu2">
        <ul>
          <li class="deroulant2"><a href="articles.php"></a>
            <ul class="list2">
              <?php while ($categorie = $cat->fetch()) : ?>

                <li>
                  <a href="articles.php?id=<?= $categorie['id'] ?>"> <?= $categorie['nom'] ?></a>
                </li>
              <?php endwhile ?>

            </ul>
          </li>
        </ul>
      </div>

      <nav class="navigation">
        <div class="menu">
          <ul>
            <li class="deroulant"><a href="index.php"></a>
              <ul class="list">
                <li><a href="index.php">Accueil</a></li>
                <li> <a href="articles.php">Les articles</a></li>
                <?php

                if (isset($_SESSION['login']) == 1 || isset($_SESSION['admin']) == "admin" || isset($_SESSION['mode']) == "mode") {

                  echo ' <li><a href="deco.php">Déconnecter</a></li>
                         <li> <a href="profil.php">Profil</a></li>';
                } else {
                  echo '<li>  <a href="connexion.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>';
                }
                if (isset($_SESSION['admin']) == "admin" || isset($_SESSION['mode']) == "mode") {
                  echo '<li><a href="admin.php">Admin</a></li>';
                  echo '<li><a href="cree_article.php">Créer un article</a></li>';
                }

                ?>

              </ul>
            </li>
          </ul>
        </div>
        <div class="open">
          <button class="open-button" onclick="openForm()">Admin</button>
        </div>
      </nav>
  </header>
  <?php

  if (isset($_POST['submit'])) {
    if ((!empty($_POST['pseudo']) and !empty($_POST['mdp']))) {
      $pseudoParDefaut = "admin";
      $mdpParDefaut = "admin";
      $pseudo_post = htmlspecialchars($_POST['pseudo']);
      $mdp_post = htmlspecialchars($_POST['mdp']);
      echo 1;
      if ($pseudo_post == $pseudoParDefaut and $mdp_post == $mdpParDefaut) {
        $_SESSION['mdp'] = $mdp_post;
        header('location:admin.php');
        echo 2;
      } else {
        echo "accés refuser";
      }
    }
  }
  ?>


  <div class="login-popup">
    <div class="form-popup" id="popupForm">
      <form class="form-container" method="post">
        <h2>Administration</h2>
        <label for="pseudo">
          <strong>Login</strong>
        </label>
        <input type="text" name="pseudo" placeholder="Entrer le login" required />
        <label for="mdp">
          <strong>Mot de passe</strong>
        </label>
        <input type="password" id="mdp" placeholder="Entrer le mot de passe" name="mdp" required />
        <button type="submit" name="submit" class="btn">Connecter</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
      </form>
    </div>
  </div>
  <script>
    function openForm() {
      document.getElementById("popupForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("popupForm").style.display = "none";
    }
  </script>
</body>