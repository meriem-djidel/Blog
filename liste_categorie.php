<?php
session_start();
require 'Categorie.php';
require 'connect.php';
require 'Post.php';
require 'auth.ph.php';
require 'header.php';
$title = "Liste categorie";


//REQUETE POUR COMPTER PAR L'ID LE NOMBRE D'ARTICLE / FETCH_NUM RECUPERE LES ARTICLES SOUS FORME DE TABLEAU NUMERIQUE:RECUP QUE LA 1ER COLONE
 $cat = $bdd->query("SELECT * FROM categories  "); 
  if(isset($_GET['id']) and !empty($_GET['id'])) {
  $getid = $_GET['id'];

   $ca= $bdd->query("SELECT * FROM categories INNER JOIN articles ON categories.id =articles.id_categorie  "); 
  } ?>

<h1 align="center">Liste des catégories</h1>
<form method="post" action="">
<select name="page">
<?php while($article = $cat->fetch()) : ?>
    <option value="<?= $article['nom'] ?>">           
    <?= $article['nom'] ?>
    </option>
<?php endwhile ?>
  </select> 
<br />
 <input type="submit" name="submit">
</form>
<?php require 'header.php' ?>


