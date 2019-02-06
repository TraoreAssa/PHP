 <?php
session_start();

$content="<form action="" method="post">

<label> nom : </label>
<input type="text" name="pseudo"><br>

<label> mot de passe : </label>
<input type="text" name="password"><br>

<input type="submit" name="Valider"><br>

</form>";


if($_POST){
try {
    $bdd = new PDO('mysql:host=localhost;       dbname=utilisateurs;charset=utf8','root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));// les :: representent un marqueur nominatif, et la ligne array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION) traque les erreurs et affiche les messages d'erreurs
}catch (Exception $e){
    die('erreur : ' .$e->getMessage());
}

    $query= $bdd->prepare("SELECT pseudo,password FROM utilisateur WHERE pseudo = :pseudo AND password= :mdp");

    $query->execute(
        array(
            ':pseudo' => $_POST['pseudo'],
            ':mdp' => $_POST['password']
        ));  
        
     $reponse = $query->fetch();//je stocke le resultat de ma requete dans la variable $reponse

     if($reponse){
         $alert = '<div class="alert alert-success" role="danger">Bonjour ' . $reponse['pseudo'] .'</div>';
        echo $alert;
    } else {
        $alert = '<div class="alert alert-danger" role="danger">Pseudo / Mot de Passe incorrect </div>';
        echo $alert;
        echo $content;
    }
} else {
    echo $content;
}

$query->closeCursor();
} 
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>exo bdd</title>
</head>
<body>
   <form action="" method="post">

      <label> nom : </label>
      <input type="text" name="pseudo"><br>

      <label> mot de passe : </label>
      <input type="text" name="password"><br>

      <input type="submit" name="Valider"><br>
    
    </form>
</body>
</html>



