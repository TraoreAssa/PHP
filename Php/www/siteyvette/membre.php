
<?php
require_once('inc/init.inc.php');

//Etape 1 : récuperer les informations de mon utilisateur connecté ($_SESSION)
//Etape 2 : afficher ces informations dans le formulaire ci-dessous

//Etape 3 : SI l'utilisateur clique sur le bouton envoyer if($_POST) j'update ma table.
//Etape 4 : hasher le nouveau mot de passe.



if($_POST){


  $mdp =password_hash($_POST['mdp'],PASSWORD_DEFAULT);

// eviter de faire plusieurs allée et retour au serveur
    $idmembre = $_SESSION["membre"]["id_membre"];
    executeRequete("UPDATE membre SET pseudo='$_POST[pseudo]', mdp='$mdp',nom='$_POST[nom]',prenom='$_POST[prenom]',email='$_POST[email]',adresse='$_POST[adresse]'

    ,ville='$_POST[ville]' WHERE id_membre='$idmembre'");

    foreach($_POST as $key => $value){
      if($key!="mdp")
      $_SESSION['membre'][$key]=$value;
    }

    header('location:profil.php');

  
  
  
  
}

?>


<form method="post" action="">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPseudo4">Pseudo</label>
      <input type="text" name="pseudo" class="form-control" value="<?php echo $_SESSION['membre']['pseudo']?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="mdp" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputNom4">Nom</label>
      <input type="text" name="nom" class="form-control" id="inputNom4" value="<?php echo $_SESSION['membre']['nom']?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPrenom4">Prenom</label>
      <input type="text" class="form-control" name="prenom" id="inputPassword4" value="<?php echo $_SESSION['membre']['prenom']?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">E-mail</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" value="<?php echo  $_SESSION['membre']['email']?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresse</label>
    <input type="text" name="adresse" class="form-control" id="inputAddress" value="<?php echo  $_SESSION['membre']['adresse']?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" class="form-control" name="ville" value="<?php echo  $_SESSION['membre']['ville']?>" pattern="[a-zA-Z0-9-_.]{5,15}">
    </div>
    
  <button type="submit"  class="btn btn-primary">Envoyer</button>
</form>