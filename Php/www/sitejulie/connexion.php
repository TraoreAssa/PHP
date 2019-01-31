<?php
require_once('inc/init.inc.php');
require_once('inc/haut.inc.php');

if(internauteEstConnecte()) header("location:profil.php");

if(isset($_GET['action']) && $_GET['action'] == "deconnexion") {
    session_destroy();
}

// if(isset($_POST['envoyer'])) { 

//     if(empty($_POST['pseudo'])) {
//         echo "Le champ Pseudo est vide. <br><br>";

//     } else if(empty($_POST['password'])) { 
//             echo "Le champ Mot de passe est vide. <br><br>";

//         } else {
//             $pseudo = $_POST['pseudo'];
//             $mdp = $_POST['password'];

//         if($_POST) {

//             $query = executeRequete("SELECT * FROM membre WHERE pseudo='$pseudo' and mdp='$mdp'");


//         if($query){

//             foreach($query as $key => $value) {
//                 if($key != 'mdp') {
//                     $_SESSION['membre'][$key] = $value;
//             }
//         }
//     }
//             $r = $query->rowCount();

//             if ($r >= 1) {
//                 header('location:profil.php');
//                 exit();
//             } else {
//                 echo "Pseudo et/ou mot de passe invalide <br><br>";
//             }
//             $query->closeCursor();  
//         }
//     }
// }

if($_POST) {     // ---> CODE DE YASSINE <---

    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['password'];

    $resultat = executeRequete("SELECT * FROM membre WHERE pseudo='$pseudo' and mdp=MD5('$mdp')");

    $membre = $resultat->fetch(PDO::FETCH_ASSOC);

    if($membre){

        foreach($membre as $key => $value) {
            if($key != 'mdp') {
                $_SESSION['membre'][$key] = $value;
            }
        }

        header('location:profil.php');

    } else {
        echo "Pseudo et/ou mot de passe invalide <br><br>";
    }
}
 
?>

<div class="form_container">
<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputPseudo1">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" id="exampleInputPseudo1" placeholder="Entrer votre pseudo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Mot de passe">
  </div>
  <button type="submit" name="envoyer" class="btn btn-primary">Se connecter</button>
</form>
</div> 


<?php require_once('inc/bas.inc.php'); ?>