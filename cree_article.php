<?php
require 'header.php';
require 'connect.php';
$title = "Crée article";
// utilisateur_connecte();
// - Une page permettant de créer des articles (creer-article.php) :
// Cette page possède un formulaire permettant aux modérateurs et
// administrateurs de créer de nouveaux articles. Le formulaire contient donc
// le texte de l’article, une liste déroulante contenant les catégories existantes
// en base de données et un bouton submit.

// $cat = $bdd->query("SELECT * FROM categories  ");
// if (isset($_GET['id']) and !empty($_GET['id'])) {
//   $getid = $_GET['id'];
//   $ca = $bdd->query("SELECT * FROM categories INNER JOIN articles ON categories.id =articles.id_categorie");
// }
//redaction pour article cree-article
if (isset($_POST['submit'])) {

  if (!empty($_POST['Newtitre']) && !empty($_POST['Newarticle']) && !empty($_POST['categorie'])) {
    echo 3;
    $id = $_SESSION['id'];
    $Newtitre = htmlspecialchars($_POST['Newtitre']);
    $Newarticle = htmlspecialchars($_POST['Newarticle']);
    $categorie = htmlspecialchars($_POST['categorie']);

    $ins = $bdd->prepare("INSERT INTO articles( titre, article, id_utilisateur, id_categorie, date ) VALUES( '$Newtitre', '$Newarticle', '$id', '$categorie', NOW())");
    $ins->execute();
    var_dump($ins);
     if ($ins  == 1) {
     $succes = '<h3>Votre article a bien été envoyer</h3>';
     $_SESSION['titre'] = $ins;
     $_SESSION['article'] = $ins;
   } else {
        $erreur = '<h3><span style="color:red"> Veuillez remplir tous les champs</span></h3>';
      }
  }
} ?>
<br>
<div class="form" align="center">
  <div class="form-body">
  <form method="post" align="center">
    <!-- <h4>Liste des catégories</h4> -->
    <select name="categorie">
      <?php
      $cat = $bdd->query("SELECT * FROM categories  ");
      while ($article = $cat->fetch()) : ?>
        <option value="<?= $article['id'] ?>">      
          <?= $article['nom'] ?>
        </option>
      <?php endwhile ?>
    </select>
    <br>
    <input type="text" name="Newtitre" placeholder="Titre"><br>
    <textarea name="Newarticle" id="textarea" cols="30" rows="10"></textarea>
    <br><br><button type="submit" name="submit">envoyer</button>
  </form>
  </div>
 </div>
  <?php if (isset($succes)) {
    echo $succes;
  } ?>
  <?php if (isset($erreur)) {
    echo $erreur;
  } ?>


  <?php require 'footer.php' ?>