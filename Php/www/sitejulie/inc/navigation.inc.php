<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Monsite.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

    <?php

    if(internauteEstConnecteEtEstAdmin()) {
      echo '<li class="nav-item active">
        <a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_membre.php">Gestion membre</a>
      </li>';
      echo '<li class="nav-item active">
        <a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_commande.php">Gestion commande</a>
      </li>';
      echo '<li class="nav-item active">
        <a class="nav-link" href="' . RACINE_SITE . 'admin/gestion_boutique.php">Gestion de la boutique</a>
      </li>';
    }

    if(internauteEstConnecte()) {
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'profil.php">Voir mon profil</a>
      </li>';
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'boutique.php">Accès à la boutique</a>
      </li>';
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'panier.php">Voir mon panier</a>
      </li>';
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Déconnexion</a>
      </li>';
    } else {
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'inscription.php">Inscription</a>
      </li>';
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'connexion.php">Connexion</a>
      </li>';
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'boutique.php">Acceder à la boutique</a>
      </li>';
    echo '<li class="nav-item active">
      <a class="nav-link" href="' . RACINE_SITE . 'panier.php">Voir mon panier</a>
      </li>';
    }

    ?>

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo RACINE_SITE; ?>inscription.php">Inscription</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo RACINE_SITE; ?>connexion.php">Connexion</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo RACINE_SITE; ?>boutique.php">Accès à la boutique</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo RACINE_SITE; ?>panier.php">Voir mon panier</a>
      </li>
    </ul>
  </div>
</nav>