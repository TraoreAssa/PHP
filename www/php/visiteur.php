<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visiteur</title>
</head>
<body>
    <?php
    // avec POO.php
        include_once('visiteur.class.php'); 
        //inclure 1 fois

        $visiteur1 = new Visiteur;
        $visiteur2 = new Visiteur;
        

        $visiteur1 -> set_prenom('Assa');
        $visiteur2 -> set_prenom('Aisse');

        echo 'Bonjour ' .$visiteur1 ->get_prenom().'<br>'; 
        echo 'Bonjour ' .$visiteur2 ->get_prenom().'<br>'; 
        //-------------------------------------------------------

        $visiteur = new Visiteur;
        $visiteur -> set_prenom('Hatouma');
        $visiteur -> set_nom('Traore');

        echo 'Ton nom ? ' .$visiteur ->nom; 
        echo 'Ton prenom ? ' .$visiteur ->prenom; // ne s'affiche pas car $prenom est en privat donc ne peux pas etre utiliser en dehors de la class 
        // Si nom apres prénom php affichera rien!

        
        


    ?>
</body>
</html>