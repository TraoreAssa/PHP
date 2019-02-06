<?php 
require_once('inc/init.inc.php');
require_once('inc/haut.inc.php');

if($_POST){
    debug($_POST);
    $verif_caractere= preg_match('#^[a-zA-Z0-9._]+$#', $_POST['pseudo']);//le pattern prend 2 param: les caracteres autorisés dans la valeur:( tout ce qui est entre les # est accepté), et la variable qui reçoit lesdits caracteres, ici $_POST['pseudo']
    if(!$verif_caractere || (strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20)){//!verif_caractere renvoie false, (strlen($_post...)) renvoie true, or il attent que les deux soient true, du coup il n'execute pas la condition si l'operateur est &&. on met donc ||
        $content .= '<div class="alert alert-danger" role="alert"> Le pseudo doit contenir entre 1 et 20 caracteres. <br> Caracteres acceptés: lettres a-z, A-Z, chiffres 0-9</div>';
    } else {
        $membre = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
        if($membre->rowCount() > 0){//rowcount() compte le nb de lignes , si le nb est sup a 0, alors affiche :
            $content .= '<div class="alert alert-danger" role="alert">Pseudo indisponible, veuillez en choisir un autre.</div>';
        } else {
            foreach($_POST as $key => $value){
                if($key === 'mdp'){
                   $_POST['mdp'] = password_hash($value, PASSWORD_DEFAULT);
                   echo $_POST['mdp'];
                }
                $_POST[$key] = htmlspecialchars(addslashes($value));
            }

            executeRequete("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite, ville, code_postal, adresse, accepter) VALUES ('$_POST[pseudo]', MD5('$_POST[mdp]'), '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]', '$_POST[accepter]')");

            $content .='<div class="alert alert-success" role="alert">Felicitations vous êtes bien inscrit ! <a href="connexion.php">Cliquez ici pour vous connecter</a> </div>';   
            }
    }
}
?>

<?php echo $content ?>
<form method="post" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPseudo4">Pseudo</label>
      <input type="text" class="form-control" id="inputPseudo4"name="pseudo" placeholder="pseudo">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="mdp" placeholder="Password">
    </div>
 </div>

 <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputNom4">Nom</label>
      <input type="text" class="form-control" id="inputNom4" name="nom" placeholder="nom">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPrenom4">Prenom</label>
      <input type="text" class="form-control" id="inputPrenom4" name="prenom" placeholder="prenom">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCivilite4">civilité</label>
      <input type="radio" name="civilite" value="m" checked>Homme
      <input type="radio" name="civilite" value="f" checked>Femme
    </div>
  </div>

    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputVille4">Ville</label>
      <input type="text" name="ville" class="form-control" id="inputVille4" placeholder="ville" pattern="[a-zA-Z0-9-_.]{5,15}">
      </div>
      <div class="form-group col-md-2">
      <label for="inputZip">Code Postal</label>
      <input type="text" name="code_postal" class="form-control" id="inputZip">
    </div>
    <div class="form-group col-md-4">
      <label for="inputAdresse">Adresse</label> 
      <input type="text" name="adresse" class="form-control" id="inputAdressel4" placeholder="adresse">
      </div> 
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="accepter">
      <label class="form-check-label" for="gridCheck">
        J'accepte
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
<?php require_once('inc/bas.inc.php'); ?>