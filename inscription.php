<?php
require 'connect.php';
require 'header.php';

$title = "Inscription";
$erreur = null;
$djaco = null;
$valu = null;

if (isset($_POST['submit'])) {
  $id = 'id';
  $login = $_POST['login'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];
  $email = $_POST['email'];
  $id_droits = 'id_droits';

  $requet = $bdd->query("SELECT * FROM utilisateurs WHERE login='$login'");
  $requet->execute();
  $result = $requet->fetchAll();
  $row = $requet->rowCount();

  if ($password != $password_confirm) {
    $erreur = "Les mots de passe ne sont pas identique";
  } elseif ($row == TRUE) {
    $erreur = "Utilisateur déja existant ";
    $djaco = "Connectez-vous";
  } if ( $login == 'mode' && $password == 'mode') {
    $requet = $bdd->prepare("INSERT INTO utilisateurs ( `login`, `password`, `email`, `id_droits`) VALUES ('$login','$password','$email',42)");
   $requet->execute();
   $_SESSION['id_droits'] = $requet;

   header('location:connexion.php');
 }
  elseif ($login == 'admin' && $password == 'admin' ) {
     $requet = $bdd->prepare("INSERT INTO utilisateurs ( `login`, `password`, `email`, `id_droits`) VALUES ('$login','$password','$email',1337)");
    $requet->execute();
    $_SESSION['id_droits'] = $requet;

    header('location:connexion.php');
  } else {
    $req = $bdd->prepare("INSERT INTO utilisateurs ( `login`, `password`, `email`, `id_droits`) VALUES ('$login','$password','$email',1)");
    $req->execute();
    header('location:connexion.php');
  }
}




?>
<h1 align="center">Inscription</h1>
<?php if ($erreur) : ?>
  <div>
    <h3> <?= $erreur ?></h3>
  </div>
<?php endif ?>

<?php if ($djaco) : ?>
  <div>
    <h3 align="left"><a href="connexion.php"><?= $djaco ?> </a></h3>
  </div>
<?php endif ?>

<div class="form" align="center">
  <div class="form-body">
  <form method="post" align="center">
   <b> <input type="hidden" name="nom" value="" />
    <th>Votre Login: </th><br><input type="text" name="login" id="" placeholder="Ex : Login"><br>
    <th>Votre mot de passe:</th><br><input type="password" name="password" id="" placeholder="********"><br>
    <th>Votre mot de passe:</th><br><input type="password" name="password_confirm" id="" placeholder="********"><br>
    <th> Votre email: </th><br><input type="email" name="email" id="email" placeholder="Ex : Login@gmail.com"><br></b>
    <button type="submit" name="submit">Valider</button>
  </form>
</div>
<?php require 'footer.php' ?>