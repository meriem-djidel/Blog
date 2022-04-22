<?php

require 'header.php';
$title = "Profil";
// - Une page permettant de modifier son profil (profil.php) :
//     Cette page possède un formulaire permettant à l’utilisateur de modifier
//     l’ensemble de ses informations

$login_sess = $_SESSION['login'];
$req = $bdd->prepare("SELECT *  FROM utilisateurs WHERE login= '$login_sess'");
$req->execute();
$result = $req->fetchAll();
$login = $result[0][1];
$password = $result[0][2];
$email = $result[0][3];

if (isset($_POST['submit'])) {

  $logins = $_POST['login'];
  $passwords = $_POST['password'];

  if ($logins != 'admin') {
    $requete = $bdd->query("UPDATE utilisateurs SET login = '$logins' ,  password = '$passwords'  WHERE login = '$login_sess'");
    $_SESSION['login'] = $logins;
    header('location:index.php');
  }
  die('ca marche');
}
?>

<?php
?>

<h1 align="center">Profil</h1>
<div class="form" align="center">
  <div class="form-body">

  <form method="post" align="center">
    <input type="hidden" name="nom" value="" />
    <th>Votre Login: </th><br><input type="text" name="login" id="" value="<?php echo $logins; ?>"><br>
    <th>Mot de passe:</th><br><input type="password" name="password" id="" value="<?php echo $password; ?>"><br>
    <th>Email: </th><br><input type="email" name="email" id="email" value="<?php echo $email; ?>"><br>
    <button type="submit" name="submit">Valider</button>
  </form>
</div>