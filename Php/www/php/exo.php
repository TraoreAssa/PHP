<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>La Méthode GET</title>
    </head>

    <body>

        <!--
        creer 2 fichiers et récupérer via l'url le numéro de téléphone, age, nom et id.
        -->

        <?php
        $numero = 625891949;
        $age = 18;
        $nom = "Ciboulette";
        $id = 344;
        ?>

        <a href="exo_.php?numero=<?=$numero?> &amp; age=<?=$age?>  &amp; nom=<?=$nom?>  &amp; id=<?=$id?>">Clique ici !</a>

    </body>

</html>