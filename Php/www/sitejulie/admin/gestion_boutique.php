<?php
require_once('../inc/init.inc.php');
require_once('../inc/haut.inc.php');

if(!internauteEstConnecteEtEstAdmin()) header("location:../connexion.php");

if($_POST) {
    debug($_POST);
    $photo_bdd="";
    if(!empty($_FILES['photo']['name'])) {
        debug($_FILES);
        $nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];
        $photo_bdd = RACINE_SITE . "photo/$nom_photo";
        $photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "photo/$nom_photo";
        copy($_FILES['photo']['tmp_name'], $photo_dossier);
    }

    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(addslashes($value));
    }

    executeRequete("INSERT INTO produit(reference, categorie, titre, description, couleur, taille, public, photo, prix, stock) 
    VALUES('$_POST[reference]','$_POST[categorie]','$_POST[titre]', '$_POST[description]','$_POST[couleur]','$_POST[taille]','$_POST[public]','$_POST[photo]','$_POST[prix]','$_POST[stock]')");

    $content .= '<div class="alert alert-success" role="alert">
    Félicitation votre produit a bien été ajouté ! </div>';
}

?>

<?php echo $content ?>

<form method="post" enctype="multipart/form-data" action="">
  <div class="form-group">
    <label for="reference">Référence Produit</label>
    <input type="text" class="form-control" id="reference" placeholder="la référence du produit" name="reference">
  </div>
  <div class="form-group">
    <label for="categorie">Catégorie</label>
    <input type="text" class="form-control" id="categorie" placeholder="la catégorie du produit" name="categorie">
  </div>
  <div class="form-group">
    <label for="titre">Titre du produit</label>
    <input type="text" class="form-control" id="titre" placeholder="le titre du produit" name="titre">
  </div>
  <div class="form-group">
    <label for="description">Description du produit</label>
    <input type="text" class="form-control" id="description" placeholder="la description du produit" name="description">
  </div>
  <div class="form-group">
    <label for="couleur">Couleur</label>
    <input type="text" class="form-control" id="couleur" placeholder="la couleur du produit" name="couleur">
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Taille</label>
    <select class="form-control" id="taille" name="taille">
      <option value="s">S</option>
      <option value="m">M</option>
      <option value="l">L</option>
      <option value="xl">XL</option>
    </select>
  </div>

  <div class="form-group">
    <label for="public">Sexe</label><br>
    <input type="radio" name="public" value="m">Homme<br>
    <input type="radio" name="public" value="f">Femme<br>
    <input type="radio" name="public" value="mixte">Mixte<br>
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="text" id="photo" name="photo">
  </div>
  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" placeholder="Prix du produit">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" placeholder="Stock du produit">
  </div>
  <button type="submit" name="envoyer" class="btn btn-primary">Enregistrer</button>
</form>

<?php require_once('../inc/bas.inc.php'); ?>