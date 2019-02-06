

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tp au pois gourmand</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container-fluid">
<?php 
require_once("inc/entete.inc.php");
?>
<div clas="contenu">
<div class="row">
<div class="card" style="width: 20rem;">
  <img src="consignes/rome.jpg" class="card-img-top" alt="tomates-mozza">
  <div class="card-body">
    <h5 class="card-title">Formule Rome</h5>
    <p class="card-text"> - Tomates buratina<br>
          - Rizotto aux asperges<br>
          - Panna cotta</p>
    <a href="atelier2.php?formule=rome&prix=25€&img=consignes/rome.jpg" class="btn btn-primary">Choisir</a>
  </div>
</div>
<div class="card" style="width: 20rem;">
  <img src="consignes/nyork.jpg" class="card-img-top" alt="mini-burger">
  <div class="card-body">
    <h5 class="card-title">Formule New-York</h5>
    <p class="card-text">- César salade<br>
          - Cheese burger<br>
          - Cheesecake</p>
    <a href="atelier2.php?formule=New-york&prix=23€&img=consignes/nyork.jpg" class="btn btn-primary">Choisir</a>
  </div>
</div>
</div>
<div class="row">
<div class="card" style="width: 20rem;">
  <img src="consignes/delhi.jpg" class="card-img-top" alt="epices">
  <div class="card-body">
    <h5 class="card-title">Formule Delhi</h5>
    <p class="card-text"> - Poppadoms<br>
          - Agneau byriani<br>
          - Lassi mangue</p>
    <a href="atelier2.php?formule=delhi&prix=24€&img=consignes/delhi.jpg" class="btn btn-primary">Choisir</a>
  </div>
</div>
<div class="card" style="width: 20rem;">
  <img src="consignes/hanoi.jpg" class="card-img-top" alt="nems">
  <div class="card-body">
    <h5 class="card-title">Formule Hanoi</h5>
    <p class="card-text">- Nems aux crevettes<br>
          - Poulet saté<br>
          - Perles de coco</p>
    <a href="atelier2.php?formule=hanoi&prix=28€&img=consignes/delhi.jpg" class="btn btn-primary">Choisir</a>
  </div>
</div>
</div><!--fin row-->
</div>
<?php require_once("inc/bas.inc.php");?>
</div><!--fin class container-fluid-->

</body>
</html>