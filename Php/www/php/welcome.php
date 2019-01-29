<?php 

// ERREUR - NE FONCTIONNE PAS !!!

// Réaliser un espace de dialogue.
// Création de la BDD et de la table.

/* Rendu :

(affichage des messages avec la date du message).

Pseudo :
Message :
Bouton envoyer.
*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Tchat PHP</title>
    </head>

    <body>

    <?php echo "<fieldset>" . $content . "</fieldset>" ?>

    <form action="" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
        <input type="submit" value="Envoyer" />
    </p>
    </form>

<?php

// connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tchat;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// sauvegarde du message
if($_POST) {
    $query = $bdd->prepare("INSERT INTO mini_tchat (pseudo, message, date_msg) VALUES (:pseudo, :message, NOW()");
    $query->execute(array(
        // sécurité à l'insertion des messages et du pseudo (injection SQL)
        ':pseudo' => $_POST['pseudo'],
        ':message' => $_POST['message']
    ));
}

// affichage du message
$query2 = $bdd->query('SELECT pseudo, message, date_msg FROM mini_tchat');

while ($reponses = $query2->fetch()) {
    $content .= "Message de : " . $reponses['pseudo'] . "<br>" . "Contenu du message : " . $reponses['message'] . "<br>" . "Date du message : " . $reponses['date_msg'] . "<br>";
}

?>
    </body>
</html>