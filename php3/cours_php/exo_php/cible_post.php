<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cible_post</title>
</head>
<body>
<?php
    echo htmlspecialchars($_POST['pseudo']) . " et " . $_POST["mdp"];
?>    
<!--la fonction htmlspecialcharts() permet d'avoir un certain controle sur ce qu'ecrivent les utilisateurs en empechant par ex l'usage d'html dans mes zones dediees aux donnees. ainsi, si l'utilisateur utilise du html, le texte ne sera pas considere comme du html mais comme du texte basique. L'utilisateur n'aura donc pas acces a mon code-->
</body>
</html>