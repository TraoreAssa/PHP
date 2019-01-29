<?php 

// Un cookie qu'est ce c'est ?
// Un fichier sauvegardé sur l'ordinateur de l'internaute avec des informations.

setcookie("myCookie","contenuCookie", time()+31536000);

// Qu'est ce que la fonction time() PHP
// La fonction time() de PHP permet de donner le timestamp, cela represente le nombre de seconde écoulées entre le 01 janvier 1970 (date clé de l'informatique) et maintenant -> wikipedia timestamp




//Creer un formulaire de connexion pseudo et mdp et sauvegarder dans un cookie les infos de l'internaute (pseudo et mdp).


$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];

$expiration = 365*24*3600;
setcookie('pseudo', $pseudo, time()+$expiration);
setcookie('mdp', $mdp, time()+$expiration);

?>


<form action="" method="post">
<p>
    <label>Pseudo : <input type="text" name="pseudo" maxlength="15"></label>
</p>
<p>
    <label>Mot de passe : <input type="password" name="mdp" maxlength="15"></label>
</p>
<input type="submit" value="Valider" />
</form>