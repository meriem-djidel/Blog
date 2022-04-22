<?php
require 'header.php';
require 'connect.php';
$title= "Article";
require 'Post.php';


if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $getid = htmlspecialchars($_GET['id']);

 
  $articles = $bdd->prepare("SELECT * FROM articles WHERE  id = ?");
    $articles->execute(array($getid));
    if($articles->rowCount() ==1){

    }else{
        die("Cet article n'existe pas !");
    }
  }else{
      die('Erreur');
  }
?>

<div class="row">
    <?php foreach($articles as $art){ ?>
        <h2> <?= $art['titre'] ?></h2>
        <h3> <?= $art['article'] ?></h3>
        <h4>Ecrit le : <?= $art['date'] ?></h4>
        <?php } 
         ?>
<?php  
 $commentaire = $bdd->query("SELECT * FROM commentaires WHERE id = $getid ");
    $commentaire->execute();
    ?>
        <?php foreach($commentaire as $comm){ ?>

        
        <p>Commentaire : <br><?= $comm['commentaire'] ?></p> 
        <p> <?=  $comm['date'] ?> </p>


        <?php }   ?>

</div>
<?php
//REQUETE POUR INSERER LES COMMENTAIRES
if(isset($_POST['submit_commentaire'])) {
    if (isset($_POST['commentaire']) and !empty($_POST['commentaire'])) {
        $getid = $_GET['id'];
        $id = $_SESSION['id'];

        $commentaire = htmlspecialchars($_POST['commentaire']);
        $req = $bdd->prepare("INSERT INTO commentaires ( commentaire,id_article,id_utilisateur,date) VALUES ('$commentaire','$getid','$id',NOW())");
        $req->execute();
        $succes = "<span 'style=color:green'>Votre commentaire a bien été poster</span>";
        $_SESSION['commentaire'] = $req;
    }
}

?>

<h2 align="center">Laissez un commentaire:</h2>
<form align="center" method="POST">
 <textarea name="commentaire" cols="70" rows="5" value="" placeholder="Entrer votre message" > </textarea><br>
    <input type="submit" value="envoyer" name="submit_commentaire">
</form>
<?php if (isset($succes)) {
    echo $succes;
}  ?>

<!-- <?php require 'header.php' ?>



       