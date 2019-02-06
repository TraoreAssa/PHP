<?php  
//utilisation de bdd sur xampp, Mysql, panneau de controle shell phpmyadmin 
//plusieurs facons de creer une bdd : 
// -dans le panneau de controle : CREATE DATABASE nom_de_la_bdd
// -dans phpMyAdmin  : nouvelle base de données     // cf cours sql       
//php fait la jonction entre client et bdd
//php envoie les infos qu'il contient lors d'une requete

//trois manieres de se connecter a une bdd
// une fonction mysql_  -> elle est obsolete
// mysqli_ -> fonction amelioree de mysql
// pdo -> fonction qui permet de se connecter a n'importe quelle bdd

 // pour se connecter a une bdd, on a besoin de plusieurs infos : 

 /* - Nom de l'hôte : c'est l'adresse de l'ordinateur où mysql est installé (ici localhost)
    - Nom de la BDD : ici utilisateurs
    - le login : le login de notre hebergeur (ici root)
    - le mot de passe : le mdp pour acceder a notre hebergeur
*/
try {

$bdd = new PDO('mysql:host=localhost;       dbname=utilisateurs;charset=utf8','root', '');//les '' vides correspondent au mdp si on en a un

}catch (Exception $e){
    die('erreur : ' .$e->getMessage());
}//try execute les instructions, et s'il y a une erreur, on l'attrape avec catch et on stoppe l'execution

//on recupere ensuite le contenu de la table utilisateur avec query
$query = $bdd->query("SELECT * FROM utilisateur");

while ($donnees = $query->fetch()){
    echo $donnees['user_id'] . " " . $donnees['pseudo'] . " " . $donnees['password'] . "<br>";
}//tant qu'il y a des donnees dans ma table, affiche-les. fetch recupere les donnees demandées

$query->closeCursor(); //avec ce code on cloture le traitement, il ne faut pas l'oublier

?>
<!-- 
<form method="post" action="">
  <label>Pseudo : </label><br>
  <input type="text" name="pseudo"><br>

  <label>mdp: </label><br>
  <input type="text" name="password"><br>

  <input type="submit" value="Envoyer">
</form> -->
