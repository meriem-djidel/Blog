<?php
require 'connect.php';
require 'header.php';
$title = "Administration";
require 'auth.ph.php';
// - Une page d’administration (admin.php) :
// Cette page permet aux administrateurs de gérer l’ensemble du site
// (modification et suppression d’articles, création/modification et suppression
// de catégories, d’utilisateurs, droits…

if(isset($_GET['id']) AND !empty($_GET['id'])){
 $getid = $_GET['id'];
 $recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id=?') ;
$recupArticle->execute(array($getid));
if($recupArticle->rowCount()>0){
    $delet = $bdd->prepare("DELETE FROM articles WHERE id = ?");
    $delet->execute(array($getid));
    header('location:admin.php');
}else{ echo "Aucun articles n'a était trouver "; 
}
}else{
    echo "L'article n'a été récupéré";
}
?>