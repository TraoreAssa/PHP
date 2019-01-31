<?php require_once('inc/init.inc.php');
      require_once('inc/haut.inc.php');



      // inscription  en tant que membre
 
 if(isset($_POST['inscrit']))
 {


        $verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#', $_POST['pseudo']);

        if(!$verif_caractere || (strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20 ))
        {

                $content .= '<div class="alert alert-danger" role="alert">

            le pseudo doit contenir entre 1 et 20 caractères. <br> Caractères accepté : Lettre a-zA-Z chiffre 0-9.
            </div>';

        } else 
          {
              $membre = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");

              if( $membre->rowCount() >  0)
              {

                $content .= '<div class="alert alert-danger" role="alert">Pseudo indisponible. Veuillez en choisir un autre.</div>';

              } else 
                {

                      foreach ($_POST as $key => $value) 
                      {

                          if($key === 'password')
                          {

                              $mdp_crypte = password_hash($value, PASSWORD_DEFAULT);

                          }

                          $_POST[$key] = htmlspecialchars(addslashes($value));

                      }

                      $bdd->query("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville,code_postal,adresse,accepter) VALUES ('$_POST[pseudo]','$mdp_crypte','$_POST[nom]','$_POST[prenom]','$_POST[email]','$_POST[civilite]','$_POST[ville]','$_POST[cp]','$_POST[adresse]','$_POST[accepter]')");

                      $content .= '<div class="alert alert-success" role="alert">Félicitation vous êtes inscrit ! <a href="connexion.php">Cliquez ici</a> pour vous connecter</div>';

//  remplir la table infomembre pour le test en cas d'oubli ou de perte de mot de passe

                      $id_test=executeRequete("SELECT id_membre FROM membre WHERE pseudo = '$_POST[pseudo]'")->fetch(PDO::FETCH_ASSOC);
                      
                      $bdd=executeRequete("INSERT INTO infomembre (id_membre,question,reponse) VALUES('$id_test[id_membre]','$_POST[question]','$_POST[reponse]')");


                }
        }
 }






// mise à jour information sur membre




if(isset($_POST['enregistre']))
{


      $mdp =password_hash($_POST['mdp'],PASSWORD_DEFAULT);

      $idmembre=$_SESSION['membre']['id_membre'];

      // eviter de faire plusieurs allée et retour au serveur
        
          executeRequete("UPDATE membre SET pseudo='$_POST[pseudo]', mdp='$mdp',nom='$_POST[nom]',prenom='$_POST[prenom]',email='$_POST[email]',adresse='$_POST[adresse]'

          ,ville='$_POST[ville]',code_postal='$_POST[cp]' ,civilite='$_POST[civilite]'WHERE id_membre='$idmembre'");

          foreach($_POST as $key => $value)
          {

              if($key!="mdp")

              $_SESSION['membre'][$key]=$value;
            
          }

          header('location:profil.php');

  

}


 
 ?>

<?php echo $content;?>
<form method="post" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPseudo4">Pseudo</label>
      <input type="text" name="pseudo" class="form-control" id="inputPseudo4" placeholder="Pseudonyme" value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour') echo $_SESSION['membre']['pseudo'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password"  value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour'){

      $idmembre=$_SESSION['membre']['id_membre'];

      $requete=executeRequete("SELECT mdp FROM membre WHERE id_membre=$idmembre");
   

      $mdp_civilite=$requete->fetch(PDO::FETCH_ASSOC);
     
      $motDePasse= $mdp_civilite['mdp'];
       echo $motDePasse;}?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputNom4">Nom</label>
      <input type="text" name="nom" class="form-control" id="inputNom4" placeholder="Nom" value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour') echo $_SESSION['membre']['nom'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPrenom4">Prenom</label>
      <input type="text" class="form-control" name="prenom" id="inputPassword4" placeholder="Prenom" value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour') echo $_SESSION['membre']['prenom'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">E-mail</label>
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="myemail@email.com" value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour') echo $_SESSION['membre']['email'];?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Adresse</label>
    <input type="text" name="adresse" class="form-control" id="inputAddress" placeholder="1234 rue de..." value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour')  echo $_SESSION['membre']['adresse'];?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Ville</label>
      <input type="text" class="form-control" name="ville" id="inputCity" pattern="[a-zA-Z0-9-_.]{5,15}" value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour') echo $_SESSION['membre']['ville'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Code Postal</label>
      <input type="text" name="cp" pattern="[0-9]{5}" title="5 chiffre requis : 0-9" class="form-control" id="inputZip" value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour')  echo $_SESSION['membre']['code_postal'];?>">
    </div> 
  </div>
    <label>Civilite</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="civilite" id="exampleRadios1"  value="m" <?php  if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour'&& ($_SESSION['membre']['civilite'])=="m") echo 'checked'?>  >
      <label class="form-check-label" for="exampleRadios1">
        Homme
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="civilite" id="exampleRadios2" value="f" <?php  if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour'&& ($_SESSION['membre']['civilite'])=="f") echo 'checked'?>  >
      <label class="form-check-label" for="exampleRadios2">
        Femme
      </label>
    </div>
  <!--partie pour table infomembre-->
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputquestion">Question</label>
      <input type="text" class="form-control" name="question" id="inputquestion"  value="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputZip">Reponse</label>
      <input type="text" name="reponse"   class="form-control" id="inputZip" value="<?php if(isset($_GET['action'])&&$_GET['action']=='mise_a_jour')  echo $_SESSION['membre']['code_postal'];?>">
    </div> 
  </div>
<!--partie pour table infomembre-->
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="accepter" id="gridCheck" required>
      <label class="form-check-label" for="gridCheck">
        J'accepte
      </label>
    </div>
  </div>
  <?php if(!isset($_GET['action']))
  {

      echo '<button type="submit" class="btn btn-primary" name="inscrit">S\'inscrire</button>';

  }else
  {


    echo '<button type="submit" class="btn btn-primary" name="enregistre" >Enregistrer</button>';
  }
   ?>
  
</form>
<?php require_once('inc/bas.inc.php'); ?>

