<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>my second page</title>
</head>
<body>
<?php
    require_once("header.php");
    ?>
     <?php
    include_once("navigation.php");//include inclus tout le temps le fichier,   include_once verifie d'abord s'il est deja inclus ou non L'execution sera faite meme s'il y a une erreur commise.  Il existe aussi require, avec lequel l'execution s'arrete a partir du moment ou il y a une erreur, de chargement ou autre, par exemple. Require_once est donc fortement recommandé a la place de include ou include_once
    ?>
    <?php
    require_once("footer.php");
    ?>
</body>
</html>