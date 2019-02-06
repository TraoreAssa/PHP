<?php

if($_POST){

    try {

    $bdd = new PDO('mysql:host=localhost;       dbname=utilisateurs;charset=utf8','root', '');//les '' vides correspondent au mdp si on en a un

    }catch (Exception $e){
    die('Erreur : ' .$e->getMessage());
    }

    $query= $bdd->prepare("INSERT INTO utilisateur (pseudo, password) VALUES (:pseudo, :mdp)");

    $query->execute(
        array(
            ':pseudo' => $_POST['pseudo'],
            ':mdp' => $_POST['password']
        ));   
        

$query->closeCursor() ;//libere la connexion au serveur
}



?>


<form method="post" action="">
  <label>Pseudo : </label><br>
  <input type="text" name="pseudo"><br>

  <label>mdp: </label><br>
  <input type="text" name="password"><br>

  <input type="submit" value="Envoyer">
</form>
