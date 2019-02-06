<?php
session_start(); // Permet de créér un fichier 'session'
//Session permet de naviger sur plusieur page sans se connecté a chaque fois

//Voir session2.php
$_SESSION['pseudo'] = 'BissTraore';
$_SESSION['nom'] = 'Traore';
$_SESSION['prenom'] = 'Assa';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; 

unset($_SESSION['prenom']);
//Permet de vider une partie de la session
echo '<pre>'; print_r($_SESSION); echo '</pre>'; 

session_destroy();
//Supprimer la session

/* 
    Les SESSION permettent de garder des variable active quelque soit la page ou l'on se trouve, il suffit d'executer 'session_start()' pour avoir accés a ces données
*/







?>