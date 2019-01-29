<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Fonctions</title>
</head>
<body>
    <?php
       $couleur = array('bleu', 'vert');

        array_push($couleur, 'rouge', 'jaune');
        //ajouter des arguments
        array_pop($couleur);
        // Supprime la derniere valeur
        print_r($couleur);
        echo "<br><br>";

        array_unshift($couleur, 'jaune', 'violet');
        // Ajouter des éléments au debut
        print_r($couleur);
        echo "<br><br>";        
        
        echo array_shift($couleur). '<br>';
        //Supprimer le 1er élément
        print_r($couleur);
        echo "<br><br>";
        echo "<br><br>";
        //---------------------------------------------------------------------//

        $couleur1 = array('a' => "bleu", 'b' => 'vert', 'c' => 'jaune');
        $couleur2 = array('a' => "rouge", 'b' => 'violet');

        array_splice($couleur1, 1, 2, $couleur2);//Modifier 
        array_splice($couleur1, 1); //supprimer
        //Modifier ou supprimer des éléments
        print_r($couleur1);        
        echo "<br><br>";
        echo "<br><br>";

        //---------------------------------------------------------------------//        
        $alpha = array('a', 'b');
        $beta = array('c', 'd');

        $mega = array_merge($alpha,$beta);
        //Lier les 2 tableaux ou +
        print_r($mega);
        echo "<br><br>";

        $omega = array_combine($alpha, $beta);
        // Lié des tableaux (mettre le tab1 en clé et tab2 en valeur)
        print_r($omega);
        echo "<br><br>";
        echo "<br><br>";
        //

        $prenom = array('Assa', 'Pierre', 'Assa', 'Sofia');
        print_r(array_unique($prenom));
        //Supprimer les doublons
        echo "<br><br>";
        echo "<br><br>";

        $prenom1 = array('Pierre', 'Assa', 'Jean');
        sort($prenom1);
        // Tri par ordre croissant
        print_r($prenom1);
        echo "<br><br>";

        rsort($prenom1);
        // Tri par ordre décroissant
        print_r($prenom1);
        echo "<br><br>";
        echo "<br><br>";


        $agenom = array('Pierre' => 27, 'Assa' => 25, 'Jean' =>34);
        ksort($agenom);
        //Classe ordre croissant par les clé
        print_r($agenom);
        echo "<br><br>";
        
        krsort($agenom);
        //Classe ordre decroissant par les clé
        print_r($agenom);        
        echo "<br><br>";
        

        asort($agenom);
        //Classe ordre croissant par les valeurs
        print_r($agenom);
        echo "<br><br>";
        
        arsort($agenom);
        //Classe ordre decroissant par les valeurs
        print_r($agenom);
        echo "<br><br>";
        
        



        

        



    ?>

</body>
</html>