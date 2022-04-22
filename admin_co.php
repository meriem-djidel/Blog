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
    <title>Document</title>
</head>
<body>
<?php
session_start();
require 'connect.php';
 if (isset($_POST['submit'])){
    if ((!empty($_POST['pseudo'])AND !empty($_POST['mdp']))){
        $pseudoParDefaut = "administrateur";
        $mdpParDefaut = 1337;
        $pseudo_post = htmlspecialchars($_POST['pseudo']);
        $mdp_post = htmlspecialchars($_POST['mdp']);
    echo 1;
        if($pseudo_post == $pseudoParDefaut AND $mdp_post == $mdpParDefaut){
            $_SESSION['mdp'] =$mdp_post;
            header('location:admin.php');
            echo 2;
        }else {
            echo "accés refuser";
        }
    }
 }
 ?>

    <h2>Forme Popup</h2>
    <p>Cliquez sur le bouton "Ouvrir la forme" pour ouvrir la forme Popup.</p>
    <div class="open">
      <button  onclick="openForm()"><strong>Admin</strong></button>
    </div>
    <div class="login-popup">
      <div class="form-popup" id="popupForm">
        <form class="form-container" method="post">
          <h2>Veuillez vous connecter</h2>
          <label for="pseudo">
            <strong>Pseudo</strong>
          </label>
          <input type="text" name="pseudo" placeholder="Votre pseudo" required />
          <label for="mdp">
            <strong>Mot de passe</strong>
          </label>
          <input type="password" id="mdp" placeholder="Votre Mot de passe" name="mdp" required />
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
</html>