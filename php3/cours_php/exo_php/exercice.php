<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Methode get: exercice</title>
</head>
<body>
    <!--creer deux fichiers et recuperer via l'url numero de tel, age, nom et id-->

    <?php $telephone = 0600000000; $age=35; $nom="Untel"; $id=1;
     ?>
      <a href="exercice_php.php?telephone=<?= $telephone ?>&amp;age=<?=$age?>&amp;nom=<?=$nom?>&amp;id=<?=$id?>">Clique ici</a>
</body>
</html>