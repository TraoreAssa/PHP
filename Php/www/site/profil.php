<?php
require_once('inc/init.inc.php');
require_once('inc/haut.inc.php');

// Afficher les informations du membre à travers les informations enregistrées dans le fichier session. ATTENTION, si l'utilisateur n'est pas connecter, redirigez le vers la page connexion.

if(internauteEstConnecte() || internauteEstConnecteEtEstAdmin()) { 
    echo "Bonjour " . $_SESSION['membre']['pseudo'] . "<br><br>"; 
    echo "<pre>"; 
    foreach($_SESSION['membre'] as $key => $value) { 
        echo "<p> $key : $value <br>"; 
    } 
    echo "</pre>"; 
} else { 
    header("location: connexion.php"); 
}

?>

<?php require_once('inc/bas.inc.php'); ?>