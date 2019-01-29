<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Include vs Require</title>
</head>
<body>
    <?php
    include 'fichier-inclus.php';
    echo "Le fichier s'affiche normalement";
    //avec include si le ficher n'est pas bon il affichera quand meme l'echo

    require 'fichier-inclu.php';
    echo "Ce message s'affiche normalement";
     //avec require si le ficher n'est pas bon il affichera pas l'echo
    ?>

</body>
</html>