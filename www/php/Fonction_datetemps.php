<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fonction Date et Temps</title>
</head>
<body>
    
    <?php
        echo time()."<br>"; //time stop (nb de sec ecoulé depuis 1/01/1970 en JNT)

        /*  d = jour du Mois de 01 a 31
            m = mois de 01 a 12
            n = mois de 1 a 12 
            y = année
            l = jour de la semaine
            N = jour de la semaine en chiffre
            h = heure de (1 a 12)
            H = heure de (00 a 23)
            i = minute de (00 a 59)
            s = seconde de (00 a 59)
            */

            echo "Nous somme le " .date("d-m-y"). '<br>';
            // Pour afficher la date (les - sont un choix on peux mettre / ou autre)

            echo "Aujourd'hui c'est " .date("l"). '<br>'; 
            // Pour afficher le jour (Lundi, Mardi...)

            echo "il est " .date('H:i:s'). '<br>'; 
            //Pour afficher l'heure /!\ les Maj sont importantes
            
            echo date("d-m-Y", 110000000). '<br>'. '<br>';
            //date de (110000000 seconde)

            $jour = array(
                "",
                "Lundi",
                "Mardi",
                "Mercredi",
                "Jeudi",
                "Vendredi",
                "Samedi",
                "Dimanche"
            );

            $mois = array(
                "",
                "Janvier",
                "Fevrier",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Aout",
                "Septembre",
                "Octobre",
                "Novembre",
                "Decembre",
            );

            $datefr = $jour[date("N")]." " .date("d")." " .$mois[date('n')]." " .date('Y');
            echo 'Nous sommes le ' .$datefr.'<br>';
            //date en fr solution 1 avec le tableau


            setlocale(LC_TIME, 'fr_FR');
            echo 'Nous sommes le '.strftime("%A %d %B %Y  ");
            echo ' et Il est actuellement ' .strftime("%H : %M : %S");
            echo '<br/> <br/>';
            // Mettre la date en Fr solution 2


            $date1 = checkdate(12,31,2019);
            $date2 = checkdate(13,31,2019);
            $date3 = checkdate(25,01,-100);
            //verifier la date

            if($date1){
                echo "La date est valide ! <br/>";
            }
            else{
                echo "La date n'est pas valide <br/>";
            }

            if($date2){
                echo "La date est valide ! <br/>";
            }
            else{
                echo "La date n'est pas valide <br/>";
            }

            if($date3){
                echo "La date est valide ! <br/>";
            }
            else{
                echo "La date n'est pas valide <br/>";
            }

            echo '<br><br>';

            echo"<pre>";
            print_r(getdate());
            echo"</pre>";

            echo '<br><br>';

            echo"<pre>";
            print_r(getdate(1));
            echo"</pre>";
            //Pour avoir tout les details (date heure seconde jour.. en tableau).


    ?>

</body>
</html>