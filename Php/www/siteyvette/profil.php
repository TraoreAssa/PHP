<?php 

//afficher les informations du membre à travers les informations enregistrées dans le fichier session, ATTENTION, si l'utilisateur n'est pas connecté redirigez le vers la page de connexion.

require_once('inc/init.inc.php');

if(!internauteEstConnecte()) header('location:connexion.php');

require_once('inc/haut.inc.php');

//debug($_SESSION);



?>


<div class="card border-dark mb-3 profil-informations" style="max-width: 18rem;">

        <div class="card-header">

                <?php
              // AJOUTER UN AVATAR
                    if(isset($_POST)) 
                    {

                      if(isset($_FILES['avatar']['name']))
                      {

                          $photoavatar=$_FILES['avatar']['name'];

                        $photo_avatar=$_SERVER['DOCUMENT_ROOT'].RACINE_SITE."photo/$photoavatar";

                        copy($_FILES['avatar']['tmp_name'],$photo_avatar);

                        echo '<img src="'.RACINE_SITE.'photo/'.$photoavatar.'" width="70" height="70">';

                      }
                  } 
              ?>
                  
                  <?= '<span class="pseudo">' . $_SESSION['membre']['pseudo'] . "</span>"; ?>
        </div>

        <div class="card-body text-dark">
                <p class="card-text"><?= "Nom : " . $_SESSION['membre']['nom']; ?></p>
                <p class="card-text"><?= "Prenom : " . $_SESSION['membre']['prenom']; ?></p>
                <p class="card-text"><?= "Adresse E-mail : " . $_SESSION['membre']['email']; ?></p>
                <p class="card-text"><?= "Ville : " . $_SESSION['membre']['ville']; ?></p>
                <p class="card-text"><?= "Code postal : " . $_SESSION['membre']['code_postal']; ?></p>
                <p class="card-text"><?= "Adresse postal : " . $_SESSION['membre']['adresse']; ?></p>
        </div>
</div>



<ul>

      <li><a href="inscription.php?action=mise_a_jour">Mettre à jour mes informations</a></li>

      <li><a href="?action=desinscrire">Se desincrire</a></li>
</ul>

<form  method="post" enctype="multipart/form-data" >
  <div class="form-group mb-2">
   
    <input type="file"  id="avatar2" name="avatar" >
  </div>
  <input type="submit" class="btn btn-primary mb-2" value="Rajouter un avatar">
 
</form>



<?php


// UN MEMBRE SE DESINSCRIT

  if(isset($_GET['action']) && $_GET['action']=="desinscrire")
  {

      $surname=$_SESSION['membre']['pseudo'] ;

      executeRequete("DELETE FROM membre WHERE pseudo='$surname'");

      // je detruit sa session car il ne va pas se deconnecter
      session_destroy();
     
      header('location:inscription.php');
  }

// affichage du suivi des commandes en cours et l'historique des commandes passées

$pseudo=$_SESSION['membre']['pseudo'];

$identifiant=executeRequete("SELECT id_membre FROM membre WHERE pseudo='$pseudo'")->fetch(PDO::FETCH_ASSOC);

  $suivi=executeRequete("SELECT id_commande,montant,date_enregistrement,etat FROM commande  WHERE id_membre='$identifiant[id_membre]'");

?>




   <table class="table table-striped mt-5">
      <thead class="bg-info">
          <tr>
              <th scope="col"></th>
              <th scope="col">Identifiant de la commande</th>
              <th scope="col">Montant des achats</th>
              <th scope="col">Date d'enregistrement</th>
              <th scope="col">Etat pour le suivi</th>
          </tr>
      </thead>
      <tbody>
          <?php   while($ligne_suivi=$suivi->fetch(PDO::FETCH_ASSOC))
                  { 
          ?>
                    <tr>
                      <th scope="row"></th>
                      <td><?= $ligne_suivi['id_commande'] ?></td>
                      <td> <?= $ligne_suivi['montant'] ?></td>
                      <td> <?= $ligne_suivi['date_enregistrement'] ?></td>
                      <td> <?= $ligne_suivi['etat'] ?></td>
                    </tr>
            

        <?php     } 
        ?>

      </tbody>
  </table>





<?php require_once('inc/bas.inc.php');?>






