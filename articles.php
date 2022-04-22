<?php
require 'connect.php';
require 'header.php';
require 'Text.php';
require 'Post.php';
$title = "Les articles";
// - Une page contenant les articles (articles) :
// Sur cette page, les utilisateurs peuvent voir l’ensemble des articles, triés du
// plus récents au plus anciens. S’il y a plus de 5 articles, seuls les 5 premiers
// sont affichés et un système de pagination permet d’afficher les 5 suivants
// (ou les 5 précédents). Pour cela, il faut utiliser l’argument GET “start”.
// ex : https://localhost/blog/articles.php/?start=5 affiche les articles 6 à 10.
// La page articles peut également filtrer les articles par catégorie à l’aide de
// l’argument GET “categorie” qui utilise les id des categories.
// ex : https://localhost/blog/articles.php/?categorie=1&start=10 affiche les
// articles 11 à 15 ayant comme id_categorie 1).


//Recupere la page courente dans get convertie sous forme d'entier mais si elle n'existe pas sera = a 1 
$curentPage = (int)($_GET['page'] ?? 1);
if ($curentPage <= 0) {
  throw new Exception('Numéro de page invalide');
}
//REQUETE POUR COMPTER PAR L'ID LE NOMBRE D'ARTICLE / FETCH_NUM RECUPERE LES ARTICLES SOUS FORME DE TABLEAU NUMERIQUE:RECUP QUE LA 1ER COLONE
$count = (int)$bdd->query("SELECT COUNT(id) FROM articles ")->fetch(PDO::FETCH_NUM)[0];
$perpage = 5;
//ceil = arrondit un nombre 
$pages = ceil($count / $perpage);
//si page courente est superieur au nombre de page dans se cas la on envoie une expetion
if ($curentPage > $pages) {
  throw new Exception('Cette page n\'exite pas');
}
//Nombre d'éléments par page et on le multiplie par la page courente
$offset = $perpage * ($curentPage - 1);

$articles = $bdd->query("SELECT * FROM articles ORDER BY  date DESC LIMIT $perpage OFFSET $offset");

?>
<h1 align="center">Les articles du blog</h1>
<!-- <img align="left"  src="css/metaverse.jpg" height="250px" width="250px" alt=""> -->
<?php while ($a = $articles->fetch()) { ?>
  <div  class="row" >
    <table>
      <td>
        <b><?= (htmlentities(Text::excerpt($a['titre']))) ?></b><br>
        <?= (htmlentities(Text::excerpt( $a['article']))) ?> </br>
        <?= $a['date'] ?><br>
        </td>

    </table><br>
        <button><a href="article.php?id=<?= $a['id'] ?>">Lire la suite</a></button>
      <?php  } ?>
  </div>
  <br>
<?php
//si la page courente est supérieur a un alors in affiche le bouton precedent
    if($curentPage > 1): ?>
  <button><a href="articles.php?page=<?= $curentPage - 1 ?>">
  Page précédente
</a></button>
<?php endif ?>
<?php if($curentPage < $pages) : ?>
  <button><a href="articles.php?page=<?= $curentPage + 1 ?>">
  Page suivante
</a></button>
<?php endif ?>
<?php require 'footer.php' ?>