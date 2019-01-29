<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les constantes</title>
</head>
<body>
    
    <?php
        /* 
        La valeur d'une constante est ... constante (exception : constante "magiques")
        Le nom des constantes est sensible a la casse
        Par convention, on ecrit les constantes en Maj
        Le nom d'une constante commece par une lettre ou _
        */

        define("BIENVENUE", "Bienvenue sur mon site !");
        echo BIENVENUE;

        //--------------------------------------------
        $a = "Bonjour";
        define("NOMBRE",4);

        function portee() {
            //echo $a;  ne fonctionne pas car declarer en dehors de la fonction (variable global)
            echo NOMBRE; 
            // une constante peut etre utilisée meme si elle est global
            
            echo '<br>';

            $b = 36;
            echo $b;
        }

        portee();
        echo '<br><br>';
        
        //echo $b;  ne fonctionne pas car declarer en dans la fonction (variable locale)



        //---------------------------------------------------------------------------------

        echo __LINE__ .'<br>'; // ligne ou nous sommes (46)
        function test(){
            echo __FUNCTION__ .'<br>'; // fonction que je test (test)
        }
        test();

        echo __FILE__ .'<br>'; // chemin jusqu'au dossier ou je suis (constantes.php)
        echo __DIR__ .'<br>'; // chemin des dossiers
        echo __LINE__ .'<br>'; // ligne ou je suis (54)
        

       /*  __CLASS__
        __METHOD__
        __NAMESPACE__ */

        
    ?>

</body>
</html>