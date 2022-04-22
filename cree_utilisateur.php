<?php
require 'header.php';
require 'connect.php';
$title = "Crée article";

if (isset($_POST['submit'])) {
    $id = 'id';
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $email = $_POST['email'];
    $id_droits = $_POST['id_droits'];
  
    $requet = $bdd->query("SELECT * FROM utilisateurs WHERE login='$login'");
    $requet->execute();
    $result = $requet->fetchAll();
    $row = $requet->rowCount();
  
    if ($password != $password_confirm) {
      $erreur = "Les mots de passe ne sont pas identique";
    }elseif ($row == TRUE) {
      $erreur = "Utilisateur déja existant ";
      $djaco = "Connectez-vous";
    }else {
     
    
      $req = $bdd->prepare("INSERT INTO utilisateurs (`id`, `login`, `password`, `email`, `id_droits`) VALUES ('$id','$login','$password','$email','$id_droits')");
      $req->execute();
  
      $_SESSION['login'] = $login; 
      $_SESSION['email'] = $req;  
   
        header('location:admin.php');
  
    }
  }
  ?>
<br>
<div class="form" align="center">
  <form method="post" align="center">
    <input type="hidden" name="nom" value="" />
    <th>Votre Login: </th><br><input type="text" name="login" id="" placeholder="Ex : Alexandra45"><br>
    <th>Mot de passe:</th><br><input type="password" name="password" id="" placeholder="********"><br>
    <th>Mot de passe:</th><br><input type="password" name="password_confirm" id="" placeholder="********"><br>
    <th>Email:       </th><br><input type="email" name="email" id="email" placeholder="Ex : Alex&656@gmail.com"><br>
    <button type="submit" name="submit">Valider</button>
  </form>
</div>
<?php require 'footer.php' ?>