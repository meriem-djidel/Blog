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
 $recupComm = $bdd->prepare('SELECT * FROM commentaires WHERE id=?') ;
$recupComm->execute(array($getid));
if($recupComm->rowCount()>0){
    $delet = $bdd->prepare("DELETE FROM commentaires WHERE id = ?");
    $delet->execute(array($getid));
    header('location:admin.php');
}else{ echo "Aucun commentaire n'a était trouver "; 
}
}else{
    echo "Le commentaire n'a été récupéré";
}
?>