
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La methode post</title>
</head>
<body>
    <form action="" method="post">
      <p><label>Pseudo : <input type="text" name="pseudo"></label></p>
      <p><label>Mot de passe : <input type="password" name="mdp"></label></p>
      <input type="submit" value="valider">
    </form>


    <!--exercice: creer une condition qui autorise l'acces uniquement aux personnes autorisées ayant le bon mot de passe : lepoles. Si les conditions sont reunies, afficher un message d'accueil, sinon dites un message d'erreur-->

    <?php

    $mot_de_passe="";
  if($_POST){//$_POST : supervariable de type tableau qui me permet de recuperer les infos ecrites dans mon formulaire.Cette condition me dit :si j'ai clique sur le bouton valider, les fonctions ci-apres s'activent
      if(htmlspecialchars($_POST['mdp'])!="lepoles"){
          $mot_de_passe .=  "c'est pas bon";
      }else{
          $mot_de_passe .= "oki vous pouvez passer" . htmlspecialchars($_POST['pseudo']);
      }
  }
    

    ?>

</body>
</html>