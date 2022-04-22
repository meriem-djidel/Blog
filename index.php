<?php
require 'header.php';
require 'Text.php';
require 'Post.php';
$title = "Metaverse";
?>


<?php

$article = $bdd->prepare("SELECT * FROM articles ORDER BY date DESC LIMIT 3  ");
$article->execute();
?>
<h1 align="center">Blog sur le Metaverse</h1>
<h2>Les articles populaire</h2>
<table class="artPop">
  <?php
  foreach ($article as $a) : ?>
    <td>
      <b><?= (htmlentities(Text::excerpt($a['titre']))) ?></b><br>
      <?= (htmlentities(Text::excerpt($a['article']))) ?><br>
      <a href="article.php?id=<?= $a['id'] ?>" class="lire">Lire la suite</a></p>
    <?php endforeach ?>
    </td>
</table>
<h1 class="titre">Les relations évoluent, et nous aussi.</h1>
<h2>Metaverse tout savoir sur cet univers virtuel qui attire les géants de la tech depuis plusieurs mois, le « metaverse » est au cœur des discussions dans le monde de la tech.
  Décryptage de ce qui pourrait bien représenter l’Internet de demain.
  Nous élaborons des technologies permettant à nos utilisateurs de garder le contact, de trouver de nouvelles communautés et de développer leur activité.</h2>
<br>
<header align="center" class="index">

  <a href="https://about.facebook.com/fr/technologies/facebook-app/"><img width="85" height="50" src="css/FacLOGO.jpg" alt=""></a>
  <a href="https://about.facebook.com/fr/technologies/messenger/"> <img width="50" height="50" src="css/MessLOGO.png" alt=""></a>
  <a href="https://about.facebook.com/fr/technologies/whatsapp/"> <img width="50" height="50" src="css/whatsLOGO.jpg" alt=""></a>
  <a href="https://about.facebook.com/fr/technologies/instagram/"><img width="50" height="50" src="css/InstaLOGO.jpg" alt=""></a>
  <a href="https://www.oculus.com/"><img width="45" height="25" src="css/OcuLOGO.jpg" alt=""></a> </th>

</header>
<section class="about">
  <div class="max-width">
    <h2 class="title">Metaverse </h2>
    <div class="about-content">
      <div class="column left">
        <img  src="css/mobile.png">
      </div>
      <div class="column right">
        <div class="text">Trouvons d’autres moyens de rester en contact avec <span>Meta </span>.</div>
        <p><span>Meta </span>élabore des technologies permettant à ses utilisateurs et utilisatrices de garder le contact, de trouver de nouvelles communautés et de développer leur activité.
          Nous dépassons les frontières des écrans en 2D pour proposer des expériences immersives en réalité virtuelle et augmentée, et contribuer à la prochaine grande évolution des technologies sociales </p>
        <a href="#">Meta</a>
      </div>
    </div>
  </div>
</section>
<?php require 'footer.php' ?>