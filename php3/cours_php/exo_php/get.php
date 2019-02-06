<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La methode Get</title>
</head>
<body>
<?php $nom = "piszczyglowa"; $prenom="magali";
     ?>
    <p>Cette methode permet de transmettre des données en les passant par l'url
    </p>
    <a href="cible.php?nom=<?= $nom ?>&amp;prenom=<?=$prenom?>">Clique ici</a>
<!--ici ?= a la meme fonction que echo, et ces infos s'afficheront dans mon url-->
    
</body>
</html>