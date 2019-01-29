<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visiteur</title>
</head>
<body>
    <?php
        include_once('visiteur.class.php'); 
        //inclure 1 fois

        $visiteur1 = new Visiteur;
        $visiteur2 = new Visiteur;
        

        $visiteur1 -> set_prenom('Assa');
        $visiteur2 -> set_prenom('Aisse');

        echo 'Bonjour ' .$visiteur1 ->get_prenom().'<br>'; 
        echo 'Bonjour ' .$visiteur2 ->get_prenom().'<br>'; 

        $visiteur = new Visiteur;
        $visiteur -> set_prenom('Hatouma');
        $visiteur -> set_nom('Traore');

        echo 'Ton nom ? ' .$visiteur1 ->get_prenom().'<br>'; 
        


    ?>
</body>
</html>