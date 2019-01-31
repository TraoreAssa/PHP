<?php


//connexion à la BDD
try {
	
	$bdd = new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
}

//SESSION
session_start();

//CHEMIN
define("RACINE_SITE", "/site/" );

//VARIABLE CONTENT
$content ="";

//AUTRES FICHIERS D'INCLUSIONS
require_once("fonction.inc.php");
