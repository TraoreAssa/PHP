<?php  
require_once('../inc/init.inc.php');
require_once('../inc/haut.inc.php');
if(!internauteEstConnecteEtEstAdmin()) header("location:../connexion.php");

if(isset($commande)){
$commande=executeRequete("SELECT * FROM commande");

$content .='<div class="commandes">';
$content .='<ul>';
while($resumeCommande=$commande->fetch(PDO::FETCH_ASSOC)) { 
    $content .='<li><a href="?commandes='.$resumeCommande['id_details_commande'].'">'. $affichage['id_details_commande']. '</a></li>';//j'affiche mes commandes 
}
$content .='</ul>';
$content .='</div>';
}
 echo $content; 
 require_once("../inc/bas.inc.php");
?>