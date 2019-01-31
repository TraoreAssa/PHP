<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Erreurs et Exceptions en PHP</title>
</head>
<body>
    <?php
       /*  if(!file_exists("inconnu.txt")){
            die("Ficher non trouvé");//arret le script et affiche le message si incorrect
        }
        else{
            $ficher = fopen("inconnu.txt", "r");
        }
 */

        //-------------------------------------------------------------------

        function Division($x,$y){
            if($y == 0){
                throw new Exception("Division par 0 impossible"); //getMessage()= massage dans () de Exception. 
            }
            return $x/$y;
        }

        try{
            echo Division(2,4);
            echo Division(2,0);// si erreur le script n'affichera pas apres 
            echo Division(4,1); // ne s'affiche pas car î 2/0 est impossible!
        }

        catch(Exception $e){//
            echo 'Message d\'erreur : '.$e -> getMessage();
        }

    ?>
</body>
</html>