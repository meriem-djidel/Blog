<?php
require 'header.php';
require 'connect.php';
$title = "Crée article";

if (isset($_POST['submit'])) {
  $cat = $bdd->query("SELECT * FROM categories WHERE id ");
 
  if(isset($_POST['categorie']) AND !empty($_POST['categorie'])) {
    $nom = htmlspecialchars($_POST['categorie']);
    $ins = $bdd->prepare("INSERT INTO categories (nom) VALUES ('$nom')");
    $ins->execute();
    if ($ins) {
      $succes = '<h3>Votre catégorie a bien été envoyer</h3>';
      $_SESSION['id'] = $ins;
      $_SESSION['nom'] = $ins;
    } else {
      $erreur = '<h3><span style="color:red"> Veuillez remplir tous les champs</span></h3>';
    }
  }
} ?>
<br>
<div align="center">
  <form method="post"> 
      <input type="text" name="categorie" placeholder="Nouvelle catégorie"><br>
    <br><button type="submit" name="submit">envoyer</button>
  
  </form>

  <?php if (isset($succes)) {
    echo $succes;
  } ?>
  <?php if (isset($erreur)) {
    echo $erreur;
  } ?>

  <br>

  <?php require 'footer.php' ?>