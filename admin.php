<?php 
require 'connect.php';
require 'header.php';

$title = "Administration";
require 'Text.php';
require 'Post.php';

?>

<?php

  if($_SESSION['login'] != 1){
   header('location:index.php');
  }

$recupDroit = $bdd->query("SELECT * FROM droits ");

?>
<table class="admin">
    <thead>
        <th>Droits </th>
        <th><button class="new"><a href="cree_droit.php"> Crée</a></button>
                <?php while ($droit = $recupDroit->fetch()) { ?>
                   
                   </th>
                    </thead>
    <tbody>
        <tr>
            <td>
        <?= $droit['nom'] ?> 
            </td>
            <td>
                 <button class="delet"> <a href="delete_droit.php?id=<?= $droit['id'] ?>">
                     Supprimer
                    </a></button>
                    </td>
                <td>
                <button class="edit"><a href="update_droit.php?id=<?= $droit['id'] ?>">
                        Modifier
                    </a></button>
            </td>
        </tr>
    <?php 
    }?>
    </tbody>
</table>
<?php
$recupUser = $bdd->query("SELECT * FROM utilisateurs ");

?>
<table class="admin">
    <thead>
        <th>Utilisateurs </th>
        <th><button class="new"><a href="cree_utilisateur.php"> Crée</a></button>
                <?php while ($user = $recupUser->fetch()) { ?>
                   
                   </th>
                    </thead>
    <tbody>
        <tr>
            <td>
            <?= $user['login'] ?><?= $user['email'] ?> <?= $user['id'] ?> 
            </td>
            <td>
                 <button class="delet"> <a href="delete_utilisateur.php?id=<?= $user['id'] ?>">
                     Supprimer
                    </a></button>
                    </td>
                <td>
                <button class="edit"><a href="update_utilisateur.php?id=<?= $user['id'] ?>">
                        Modifier
                    </a></button>
            </td>
        </tr>
    <?php 
    }?>
    </tbody>
</table>
<?php
$recupCat = $bdd->query("SELECT * FROM categories ");

?>
<table class="admin">
    <thead>
        <th>Catégories</th>
        <th><button class="new"><a href="cree_categorie.php"> Crée</a></button>
                <?php while ($categorie = $recupCat->fetch()) { ?>
                   
                   </th>
                    </thead>
    <tbody>
        <tr>
            <td>
            <?= $categorie['nom'] ?> 
               
            </td>
            <td>
            <button class="delet"> <a href="delete_categorie.php?id=<?= $categorie['id'] ?>">
                     Supprimer
                    </a></button>
                    </td>
                <td>
                <button class="edit"><a href="update_categorie.php?id=<?= $categorie['id'] ?>">
                        Modifier
                    </a></button>
            </td>
        </tr>
    <?php 
    }?>
    </tbody>
</table>
<?php
                    
$recupArticle = $bdd->query("SELECT * FROM articles ");

?>
<table class="admin">
    <thead>
        <th>Articles</th>
        <th><button class="new"><a href="cree_article.php"> Crée</a></button>

        <th>
                <?php while ($articles = $recupArticle->fetch()) { ?>
        </th>      
    </thead>
    <tbody>
        <tr>
            <td>
                <?=  (htmlentities(Text::exxerpt($articles['titre']))) ?>
                <?=  (htmlentities(Text::excerpt($articles['article']))) ?>
            </td>
            <td>
                <button class="delet"><a href="delete_article.php?id=<?= $articles['id'] ?>">
                        Supprimer
                </a></button>
                </td>
                <td>
                <button class="edit"><a href="update_article.php?id=<?= $articles['id'] ?>">
                        Modifier
                </a></button>
            </td>
        </tr>
    <?php 
    }?>
    </tbody>
</table>
<?php if(isset($succes)){ echo $succes ; }  ?>
<?php  require 'footer.php'?>