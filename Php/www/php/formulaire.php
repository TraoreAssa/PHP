<!-- creer un formulaire de contact qui permet à l'utilisateur d'enregistrer ses contacts dans un fichier :nom, prenom, adresse, cp, ville et e-mail.!!!!!!!! Sécuriser votre code !!!!!!!!

!!!!!!!! la doc PHP sera votre meilleur ami !!!!!!!!!
!!!!!!!! Controler les saisies (chaine vide, balises etc.)!!!!!!!!!!!

Valeur de retour :

Nom : JAAGOUB
Prenom : Yassine
Adresse : mon adresse
CP : 78300
Ville : Poissy
E-mail : monemail@gmail.com -->



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body>

<form action="" method="post">
    <p>
        <label>Nom : <input type="text" name="nom" maxlength="15" placeholder="Nom" value="<?php echo $_POST['nom']; ?>"></label>
    </p>
    <p>
        <label>Prenom : <input type="text" name="prenom" maxlength="15" placeholder="Prénom" value="<?php echo $_POST['prenom']; ?>"></label>
    </p>
    <p>
        <label>Adresse : <input type="text" name="adresse" maxlength="50" placeholder="Adresse" value="<?php echo $_POST['adresse']; ?>"></label>
    </p>
    <p>
        <label>CP : <input type="text" name="cp" pattern="[0-9]" maxlength="5" placeholder="Code Postal" value="<?php echo $_POST['cp']; ?>"></label>
    </p>
    <p>
        <label>Ville : <input type="text" name="ville" maxlength="15" placeholder="Ville" value="<?php echo $_POST['ville']; ?>"></label>
    </p>
    <p>
        <label>Adresse e-mail : <input type="email" name="mail" maxlength="30" placeholder="E-mail" value="<?php echo $_POST['mail']; ?>"></label>
    </p>
    <input type="submit" value="valider">
</form>

    <?php

$content = "";

$informations ="";

if($_POST){  
        $file = fopen("contact.txt", "a+") or die ("file not open");        
        foreach ($_POST as $key => $value) {
        if(empty($value)){
            $content .= "<div class=\"alert alert-danger\"> veuillez remplir les champs " . $key . "</div>";
        } else{
            $informations = $key . " : "  . strip_tags($value) . PHP_EOL;
            fputs($file, $informations);
        }
    }        
    fputs($file, "--------------" . PHP_EOL);        
    fclose($file);
}

    // $formulaire = fopen("contact.txt", "a+") or die ("Impossible d'ouvrir ce fichier");

    // $contact = "Nom : ".htmlspecialchars($_POST['nom']).PHP_EOL."Prénom : ".htmlspecialchars($_POST['prenom']).PHP_EOL."Adresse : ".htmlspecialchars($_POST['adresse']).PHP_EOL."Code postal : ".htmlspecialchars($_POST['cp']).PHP_EOL."Ville : ".htmlspecialchars($_POST['ville']).PHP_EOL."E-mail : ".htmlspecialchars($_POST['mail']).PHP_EOL.PHP_EOL;

    // if(empty($_POST['nom'])){
    //   echo '<div class="alert alert-info" role="alert">Veuillez saisir votre nom</div>';
    // } else if(empty($_POST['prenom'])){
    //   echo '<div class="alert alert-info" role="alert">Veuillez saisir votre prénom</div>';
    // } else if(empty($_POST['adresse'])){
    //   echo '<div class="alert alert-info" role="alert">Veuillez saisir votre adresse</div>';
    // } else if(empty($_POST['cp'])){
    //   echo '<div class="alert alert-info" role="alert">Veuillez saisir votre code postal</div>';
    // } else if(empty($_POST['ville'])){
    //   echo '<div class="alert alert-info" role="alert">Veuillez saisir votre ville de résidence</div>';
    // } else if(empty($_POST['mail'])){
    //   echo '<div class="alert alert-info" role="alert">Veuillez saisir votre adresse mail</div>';
    // }
    
    // fwrite($formulaire, $contact); 

    // fclose($formulaire);

    ?>
    
</body>
</html>