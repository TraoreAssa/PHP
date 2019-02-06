<?php

//un cookie est un fichier sauvegardé sur l'ordi de l'internaute, avec des informations non sensibles (sans mots de passe, c-a-d par ex la langue choisie pour la navigation, les gouts pour proposer du contenu ciblé correspondant aux goûts de l'utilisateur...). Un cookie par donnée

//pour creer un cookie : setcookie(trois param)
// setcookie("nomdemoncookie","contenuCookie","dateExpirationCookieEnSecondes");
setcookie("myCookie","contenuCookie",time()+31536000);//ici, temps= 1 an +


//qu'est ce que la fonction time de php?
//Cette fonction  donne le timestamp, ce qui représente le nombre de secondes écoulées entre le 1er janvier 1970 (date cle en informatique) et l'instant présent
//pour voir le timestamp : 
echo time();

//supprimer des cookies :
//dans les parametres du navigateur
?>
