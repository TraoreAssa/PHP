<!--fichier d'initialisation, que l'on retrouve sur toutes les pages--> 
<?php    

try{

    $bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','');
} catch(Exception $e){
    die('Erreur : ' .$e->getMessage());
}

//SeSSION
session_start();

//CHEMIN
define("RACINE_SITE", "/supports_poissy/cours_php/site/");

//variable content
$content = "";

//autres fichiers d'inclusion
require_once("fonction.inc.php");




?>