<?php 

//dans mon 2e fichier j'ouvre ma session_start pour qu'il recupere mes données
session_start();

//j'affiche mes données
echo $_SESSION['prenom'] . $_SESSION['nom'];

?>