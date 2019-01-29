<?php

 // Créer un formulaire de connexion.

session_start(); 

if(isset($_POST['envoyer'])) { 

    if(empty($_POST['pseudo'])) {

        echo "Le champ Pseudo est vide. <br><br>";

    } else if(empty($_POST['password'])) { 

            echo "Le champ Mot de passe est vide. <br><br>";

        } else {
            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['password'];

            if($_POST) {
                try{
                    $bdd = new PDO('mysql:host=localhost; dbname=utilisateurs; charset=utf8','root', '');
                }
                catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }

            if(!$bdd){
                echo "Erreur de connexion à la BDD. <br><br>";
            } else {

                $query = $bdd->query("SELECT pseudo, password FROM utilisateur where pseudo='$pseudo' and password='$mdp'");
                $r = $query->rowCount();
                if ($r >= 1) {
                    echo "Bienvenue " . $pseudo . " !<br><br>";
                } else {
                    echo "Pseudo ou mot de passe invalide <br><br>";
                }
                $query->closeCursor();
            }
        }
    }
}

?>

<form method="post" action="">
    <label>Pseudo :</label><br>
    <input type="text" name="pseudo"><br>

    <label>Mot de passe :</label><br>
    <input type="text" name="password"><br>

    <input type="submit" value="Envoyer" name="envoyer">
</form>