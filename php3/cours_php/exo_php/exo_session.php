<?php 
// creer une, session avec un nom, un prenom et afficher le resultat dans un autre fichier

//dans le 1er fichier, j'ouvre ma session
session_start();

//je declare mes noms et prenoms
$_SESSION['nom']='Pi';
$_SESSION['prenom']="Mag";

//pour voir le 2e fichier, cf exo_session_cible
?>