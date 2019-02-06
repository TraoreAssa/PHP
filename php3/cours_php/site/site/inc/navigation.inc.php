<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="">MonSite.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php 
    if(internauteEstConnecteEtEstAdmin()){//si l'internaute est l'admin, il a accès à :
      echo 
      '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'admin/gestion_membre.php">gestion des membres </a>
       </li>';
      echo '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'admin/gestion_boutique.php">gestion de la  boutique</a>
      </li>';
      echo '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'admin/gestion_commande.php">gestion des commandes</a>
      </li>';

    }

    if(internauteEstConnecte()){//si l'internaute est un membre, mais pas l'admin, alors il a accès à:
      echo
      '<li class="nav-item">
        <a class="nav-link" href=" '.RACINE_SITE.'connexion.php">Connexion</a>
      </li>';
      echo 
      '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'profil.php">profil </a>
       </li>';
      echo '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'boutique.php"> boutique</a>
      </li>';
      echo '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'commande.php">commande</a>
      </li>';
      echo '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'panier.php">panier</a>
      </li>';
      echo '<li class="nav-item">
      <a class="nav-link" href="'.RACINE_SITE. 'connexion.php?action=deconnexion">deconnexion</a>
    </li>';

    } else {//si l'internaute n'est pas membre, il a acces à:
      echo 
      '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'inscription.php">inscription </a>
       </li>';
      echo '<li class="nav-item">
        <a class="nav-link" href="'.RACINE_SITE. 'boutique.php"> boutique</a>
      </li>';
      echo
      '<li class="nav-item">
        <a class="nav-link" href=" '.RACINE_SITE.'connexion.php">Connexion</a>
      </li>';
    }

      ?>
      <!-- <li class="nav-item">
         <a class="nav-link" href="?php echo RACINE_SITE; ?>inscription.php">Inscription </a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?php echo RACINE_SITE; ?>connexion.php">Connexion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?php echo RACINE_SITE; ?>boutique.php">Boutique</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?php echo RACINE_SITE; ?>panier.php">Panier</a>
      </li> -->
    </ul>
  </div>
</nav>
<!--c'est dans cette page que l'on definit les conditions d'affichage en fonction du statut de l'utilisateur-->

