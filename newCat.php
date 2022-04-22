<?php
session_start();
require 'connect.php';
require 'Text.php';
require 'Post.php';
$title = "Ajouter une nouvelle catégorie";
require 'header.php';
if(isset($_POST['submit'])){
 if(isset($_POST['nom']) and !empty($_POST['nom'])) {
    $id="id";
    $nom = $_POST['nom'];

    $categories = $bdd->prepare("INSERT INTO `categories` (`id`, `nom`) VALUES ('$id','$nom')");
    $categories->execute();
    if($categories==TRUE){
        $succes = "<h2><span'style=color:green'>La catégorie a bien été crée</span></h2>";

    }

}   
}

?>
<br><br>
<?php if(isset($succes)){ echo $succes ; }  ?>

<h1 align="center">Crée catégorie</h1>
<form action="" method="POST">
    <input type="text" name="nom" placeholder="créé une nouvelle catégorie">
    <input type="submit" value="crée" name="submit">
</form> 

<?php require 'footer.php' ?>