<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exo cookie</title>
</head>
<body>
    <form action="" method="get">
      <p><label>pseudo : <input type="text" name="pseudo"></label></p>
      <p><label>mdp : <input type="password" name="mdp"></label></p>
      <a href="exo.php?pseudo=<?= $pseudo ?>&amp;mdp=<?=$mdp?>"><input type="submit" value="valider"></a>
    </form>
</body>
</html>

<!-- <a href="cible.php?nom=<?= $nom ?>&amp;prenom=<?=$prenom?>">Clique ici</a> -->

<?php

// creer un formulaire de connexion pseudo et mdp, et sauvegarder dans un cookie les infos de l'internaute (pseudo et mdp). Attention il ne s'agit que d'un exercice, on ne doit jamais sauvegarder de mdp dans une url !!! 
$content="";

if(isset($_GET['content'])){
    $content= $_GET['content'];
}elseif(isset($_COOKIE['content'])){
    $content = $_COOKIE['content'];
}else{
    echo "veuillez remplir les champs vides";
}
$expiration = 365*24*3600;
 setcookie('content',$content,time()+$expiration);
//attention le code ci-dessus n'est pas la correction
// if(isset($_GET['pays'])){//condition 1: me permet de savoir si la condition est definie
//     $pays = $_GET['pays'];//si elle est definie, stocke la
// }elseif (isset($_COOKIE['pays'])){//si un pays nommé cookie existe sur l'ordi de l'utilisateur alors on la recupere et on la stocke
//     $pays = $_COOKIE['pays'];
// }else{//si les conditions precedentes n'ont pas ete remplies alors affiche 'fr' par defaut
//     $pays= 'fr';
// }

// $expiration = 365*24*3600;
// setcookie("pays",$pays,time()+$expiration);
// ?>


