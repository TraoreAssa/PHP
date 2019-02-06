<?php  

//afficher les informations du membre à travers les infos enregistrées dans le fichier session, attention: si l'utilisateur n'est pas connecté, le rediriger vers la page connexion

require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");

if(!internauteEstConnecte()) header('location:connexion.php');

?>

<div class="card border-info mb-3" style="max-width: 18rem;">
  <div class="card-header"><?php echo $_SESSION['membre']['pseudo']?></div>
  <div class="card-body text-dark">
    <h5 class="card-title"><?php echo $_SESSION['membre']['nom']?></h5>
    <p class="card-text"><?php echo $_SESSION['membre']['prenom']?></p>
    <p class="card-text"><?php echo $_SESSION['membre']['email']?></p>
    <p class="card-text"><?php echo $_SESSION['membre']['ville']?></p>
    <p class="card-text"><?php echo $_SESSION['membre']['code_postal']?></p>
    <p class="card-text"><?php echo $_SESSION['membre']['adresse']?></p>
  </div>


<?php require_once("inc/bas.inc.php"); ?>