<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Target</title>
</head>
<body>
    <p>Bonjour
    <?php
    echo $_POST['prenom']; // prend le prenom saisie dans l'input de la page formulaire et l'affiche quand on fait Envoyer
    // on peut mettre du code html dans l'input ex(<strong><em>Assa</em></strong>) Assa s'affichera en gras et italique

    // echo htmlspecialchars($_POST['prenom']); Avec htmlspecialchars le code html s'affiche si on le met dans l'input
    // echo strip_tags($_POST['prenom']); Avec strip_tags le code html n'est pas lu et effacer si on le met dans l'input
    
    ?>
    , fais comme chez toi !</p>

    <p>Tu ne t'appelles pas 
        <?php
            echo $_POST['prenom']   
        ?>
        ? J'ai du mal comprendre !
    </p>
    <p>Clique <a href="formulaire.php"> Ici</a> pour retaper ton prénom</p>

    <!-- trim() efface les espaces en trop;
    stripcslashes(); efface les \ -->

    <?php

        $prenoms = $nom = $pseudo = "";
        function securisation($donnees){
            $donnees = trim($donnees);
            $donnees = stripcslashes($donnees);
            $donnees = strip_tags($donnees);
            return $donnees ;
        }
        $prenoms = securisation($_POST['prenoms']);
        $nom = securisation($_POST['nom']);
        $pseudo = securisation($_POST['pseudo']);
      
        echo "Ton prénom est : " .$prenoms;
        echo "Ton nom est : " .$nom;
        echo "Ton pseudo est : " .$pseudo;
    ?>



</body>
</html>