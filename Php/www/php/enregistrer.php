<?php 

if($_POST) {
    try{
        $bdd = new PDO('mysql:host=localhost; dbname=utilisateurs; charset=utf8','root', '');
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    $query = $bdd->prepare("INSERT INTO utilisateur(`pseudo`, `password`) VALUES (:pseudo, :mdp)");
    $query->execute(
        array(
            ':pseudo' => $_POST['pseudo'],
            ':mdp' => $_POST['password']
        ));
    
    $query->closeCursor();
}

?>

<form method="post" action="">
    <label>Pseudo :</label><br>
    <input type="text" name="pseudo"><br>

    <label>Mot de passe :</label><br>
    <input type="text" name="password"><br>

    <input type="submit" value="Envoyer">
</form>