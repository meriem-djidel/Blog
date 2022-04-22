<?php
require 'connect.php';
require 'header.php';

if (isset($_POST['submit'])) {
  if (!empty($_POST['login']) && $_POST['password']) {

    $login = $_POST['login'];
    $password = $_POST['password'];

    $req = $bdd->query("SELECT * FROM utilisateurs WHERE login='$login' && password='$password'");
    $req->execute();
    $utilisateur = $req->fetch();
    if ($req = $req->rowCount() == 1) {
      $_SESSION['login'] = $login;
      header('location:index.php');
      if ($login == "admin"  && $password == 'admin' || $login == "mode" && $password == 'mode') {
        $_SESSION['admin'] = $login;
        $_SESSION['mode'] = $login;

        header('location:admin.php');
      }
    } else {
      echo '<h1 align="center",style=color:red;> Votre mot de passe ou login est incorrecte</h1>';
    }
  }
}

?>
<h1 align="center">Connexion</h1>
<div class="form" align="center">
  <div class="form-body">
    <form method="post" align="center">
      <b>
        <label>Votre Login:</label> <br>
        <input type="text" name="login" id="" placeholder="Login"><br>
        <label>Votre mot de passe:</label><br><input type="password" name="password" id="" placeholder="********"><br>
      </b>
      <button type="submit" name="submit">Connexion</button>
    </form>
  </div>
</div>

<?php require 'footer.php' ?>