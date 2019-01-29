<?php 

// mysql_ -> obsolète.
// mysqli_ -> fonction améliorée de mysql_
//pdo -> fonction qui permet de se connecter a n'importe quelle BDD.

// Pour se connecter à une BDD, on a besoin de plusieurs informations :
    /*

      -Nom de l'hote : adresse de l'ordinateur où mysql est installé. (ici localhost)

      -La base : le nom de la BD a laquelle on va se connecter.

      -Le login : le login de notre hébergeur (root)

      -Le mot de passe : le mdp pour acceder à notre hébergeur

    */

try{
    $bdd = new PDO('mysql:host=localhost; dbname=utilisateurs; charset=utf8','root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// On recupere tout le contenu de la table utilisateur
$query = $bdd->query("SELECT * FROM utilisateur");

while ($donnees = $query->fetch()) {
    echo $donnees['user_id'] . " " . $donnees['pseudo'] . " " . $donnees['password'] . "<br>";
}

// Terminer le traitement de la requete.
$query->closeCursor();

?>

<form method="post" action="">
    <label>Pseudo :</label><br>
    <input type="text" name="pseudo"><br>

    <label>Mot de passe :</label><br>
    <input type="text" name="password"><br>

    <input type="submit" value="Envoyer">
</form>