<?php

//  CREATE TABLE `employes` (
//     `idtest` INT(3) NOT NULL,
//     `nom` VARCHAR(20) DEFAULT NULL,
//     `civilite` ENUM('m','f') NOT NULL,
//     `ville` VARCHAR(150) DEFAULT NULL,
//     `cp` INT(5) DEFAULT NULL,
//     `adresse` TEXT DEFAULT NULL,
//     `fichier` TEXT DEFAULT NULL
//   ) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

try 
//------------------------ CONNEXION AVEC LA BDD ------------------------
{ 
$bdd = new PDO('mysql:host=localhost;dbname=test','root','');

// echo '<pre>'; var_dump($bdd); echo '</pre>';
// echo '<pre>'; print_r(get_class_methods($bdd)); echo '</pre>';
echo "Vous etes bien connecté a la BDD <br>";
} 
catch (\PDOException $e) { // on entre ici en cas de mauvaise connexion a la BDD
die('Problème de connexion BDD' . $e->getMessage());
}

//----------------------------- INSERTION ----------------------------------------

// $resultat = $bdd->exec("INSERT INTO employes (nom, civilite, ville, cp, adresse) VALUES ('Assa', 'f', 'TRAORE', '78300', 'jhgjhbjbjk')");
$resultat = $bdd->exec("INSERT INTO employes (nom, civilite, ville, cp, adresse) VALUES ('$_POST[nom]', '$_POST[civilite]', '$_POST[ville]', '$_POST[cp]', '$_POST[adresse]')");

echo '<pre>'; print_r($resultat); echo '</pre>';
echo 'Vous avez enregistré' . $_POST['nom'];

//-------------------------------- Affichage -------------------------------------------------
$employe = executeRequete("SELECT * FROM employes");
$employe = $resultat->fetch(PDO::FETCH_ASSOC);

$q = $resultat->query("SELECT * FROM employes"); 
$r = $q->fetchAll(\PDO::FETCH_ASSOC);

foreach($_POST as $key => $value){
    
    $_POST[$key] = htmlspecialchars(addslashes($value));

}

