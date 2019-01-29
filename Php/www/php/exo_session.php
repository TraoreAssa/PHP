<?php 

// Créer une session avec un nom, un prénom et afficher le resultat dans un autre fichier.

session_start();
$_SESSION['prenom'] = 'Julie';
$_SESSION['nom'] = 'Masclaux';

echo "<pre>", print_r($_SESSION); echo "</pre>";

session_destroy();

?>