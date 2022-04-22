<?php
require 'connect.php';
require 'header.php';
 if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id=?') ;
    $recupArticle->execute(array($getid));
if($recupArticle->rowCount()>0){
    $articleInfos = $recupArticle->fetch();
    $titre = $articleInfos['titre'];
    $article = str_replace('<br/>', '',$articleInfos['article']);
    if(isset($_POST['modifier'])){
          $titrePost= htmlspecialchars($_POST['titre']);
    $articlePost = nl2br(htmlspecialchars($_POST['article']));

    $updatearticle = $bdd->prepare("UPDATE articles SET titre = ? AND article = ? WHERE id = ?");
    $updatearticle->execute(array($titrePost, $articlePost,$getid));
    header('loaction:admin.php');
    }
  
}else{ echo "Aucun utilisateur n'a était trouver "; 
}
}else{
    echo "L'identifiant n'a été récupéré";
}
 

?>
<h1>Modifier article <br> <?= $articleInfos['article'] ?></h1>
<form action="" method="post">
<input type="text" name="titre" placeholder="Titre"><br>
    <textarea name="article" id="textarea" cols="30" rows="10"></textarea>
    <br><br><button type="submit" name="modifier">Modifier</button>
  </form>