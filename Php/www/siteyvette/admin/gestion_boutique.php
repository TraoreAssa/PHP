<?php

require_once('../inc/init.inc.php');
require_once('../inc/haut.inc.php');

if(!internauteEstConnecteEtEstAdmin()) header("location:../connexion.php");

//SUPPRESSION DU PRODUIT
if(isset($_GET['action']) && $_GET['action'] == "suppression"){
	$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = $_GET[id_produit]");
	$produit_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC);
	$chemin_photo_produit_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo'];

	// pour suprimer la photo d' un produit je verifie s il son chemein est en bdd  et si le fichier existe
	if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_produit_a_supprimer)) {

		// j'efface le fichier
		unlink($chemin_photo_produit_a_supprimer);
	}

	executeRequete("DELETE FROM produit WHERE id_produit = $_GET[id_produit]");
	$content .= '<div class="alert alert-success" role="alert">Votre produit a bien été supprimé</div>';
	// $_GET['action'] = "affichage";
}


//ENREGISTREMENT DU PRODUIT
if($_POST){
	//debug($_POST);
	$photo_bdd="";

	if(isset($_GET['action']) && $_GET['action'] == "modification"){

		$photo_bdd = $_POST['photo_actuel'];
	}

	
	if(!empty($_FILES['photo']['name'])){
		//debug($_FILES);
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];

		$photo_bdd = RACINE_SITE . "photo/$nom_photo";
		// je met dans 	$photo_dossier le chemin depuis le document root de l'emplacement ou je veux mettre le fichier temporaire jusqu' au nom du fichier sans extension
		// car copy copie un fichier et prend en parametre le chemin de ces fichiers
		$photo_dossier = $_SERVER['DOCUMENT_ROOT']. RACINE_SITE . "photo/$nom_photo";

		copy($_FILES['photo']['tmp_name'], $photo_dossier);
	}

	foreach ($_POST as $key => $value) {
		$_POST[$key] = htmlspecialchars(addslashes($value));
	}

	executeRequete("REPLACE INTO produit(reference,categorie, titre, description, couleur, taille, public, photo, prix, stock) VALUES('$_POST[reference]','$_POST[categorie]','$_POST[titre]','$_POST[description]','$_POST[couleur]','$_POST[taille]','$_POST[public]','$photo_bdd','$_POST[prix]', '$_POST[stock]')");

	$content .= '<div class="alert alert-success" role="alert">Félicitation votre produit a bien été ajouté !</div>';
}

$content .= '<a href="?action=affichage">Afficher les produits</a><br>';
$content .= '<a href="?action=ajout">Ajouter un produit</a>';


//AFFICHAGE DES PRODUITS
if(isset($_GET['action']) && $_GET['action'] == "affichage")
{
	$resultat = executeRequete("SELECT * FROM produit");

	$content .= "<h2>Affichage des produits</h2>";
	$content .= "Nombre de produit(s) dans la boutique : " . $resultat->rowCount();

	$content .= '<table class="table"><thead><tr>';
	for($i = 0 ; $i < $resultat->columnCount() ; $i++){

		$colonne = $resultat->getColumnMeta($i);
		$content .= '<th scope="col">' . $colonne['name'] . '</th>';
	}

	$content .= '<th scope="col">Modification</th>';
	$content .= '<th scope="col">Suppression</th>';
	$content .= "</tr></thead>";

	$content .= "<tbody>";
	while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
		$content .= '<tr>';
		foreach ($ligne as $key => $value) {
			if($key == "photo"){
				$content .= '<td><img src="' . $value . '"width="70" height="70"></td>';
			}
			else {
				$content .= '<td>' . $value . '</td>';
			}
		}

		$content .= '<td><a href="?action=modification&id_produit=' . $ligne['id_produit'] . '">Modification</a></td>';
		$content .= '<td><a href="?action=suppression&id_produit=' . $ligne['id_produit'] . '" onClick="return(confirm(\'Etes vous certain ?\'));">Suppression</a></td>';
		$content .= "</tr>";
	}
	$content .= "</tbody></table>";

}
 
 //AJOUT OU MODIFICATION DU PRODUIT
	if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == "modification")){
		if(isset($_GET['id_produit'])){
			$resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'");
			$produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC);
		}
	}

?>

<div class="container-fluid">
	<form method="post" enctype="multipart/form-data" action="">
<?php echo $content ?>
<input type="hidden" name="id_produit" value="<?php if(isset($produit_actuel['id_produit'])) echo $produit_actuel['id_produit'] ?>">
  <div class="form-group">
    <label for="reference">Reference Produit</label>
    <input type="text" class="form-control" id="reference" placeholder="la référence du produit" name="reference" value="<?php if(isset($produit_actuel['reference'])) echo $produit_actuel['reference'] ?>">
  </div>
  <div class="form-group">
    <label for="categorie">Catégorie</label>
    <input type="text" class="form-control" id="categorie" placeholder="la categorie du produit" name="categorie" value="<?php if(isset($produit_actuel['categorie'])) echo $produit_actuel['categorie'] ?>">
  </div>
  <div class="form-group">
    <label for="titre">Titre du produit</label>
    <input type="text" class="form-control" id="titre" placeholder="le titre du produit" name="titre" value="<?php if(isset($produit_actuel['titre'])) echo $produit_actuel['titre'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php if(isset($produit_actuel['description'])) echo $produit_actuel['description'] ?></textarea>
  </div>
  <div class="form-group">
    <label for="couleur">Couleur</label>
    <input type="text" class="form-control" id="couleur" placeholder="la couleur du produit" name="couleur" value="<?php if(isset($produit_actuel['couleur'])) echo $produit_actuel['couleur'] ?>">
  </div>
  <div class="form-group">
    <label for="taille">Taille</label>
    <select class="form-control" id="taille" name="taille">
      <option value="s" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 's') echo "selected" ?>>S</option>
      <option value="m" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 'm') echo "selected" ?>>M</option>
      <option value="l" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 'l') echo "selected" ?>>L</option>
      <option value="xl" <?php if(isset($produit_actuel) && $produit_actuel['taille'] == 'xl') echo "selected" ?>>XL</option>
    </select>
  </div>
  <div class="form-group">
    <label for="public">Sexe</label><br>
   	<input type="radio" id="pubic" name="public" value="m" <?php if(isset($produit_actuel) && $produit_actuel['public'] == 'm') echo "checked" ?>>Homme<br>
   	<input type="radio" id="public" name="public" value="f" <?php if(isset($produit_actuel) && $produit_actuel['public'] == 'f') echo "checked" ?>>Femme<br>
   	<input type="radio" id="public" name="public" value="mixte" <?php if(isset($produit_actuel) && $produit_actuel['public'] == 'mixte') echo "checked" ?>>Mixte<br>
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" id="photo" name="photo">
    <?php
    	if(isset($produit_actuel)){
    		echo "<i>Vous pouvez uploader une nouvelle photo si vous le désiré</i><br>";
    		echo '<img src="' . $produit_actuel['photo'] . '" width=90 height=90><br>';
    		echo '<input type="hidden" name="photo_actuel" value="' . $produit_actuel['photo'] . '"><br>';
    	}
    ?>
  </div>
  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" placeholder="prix du produit" value="<?php if(isset($produit_actuel['prix'])) echo $produit_actuel['prix'] ?>">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" placeholder="stock du produit" value="<?php if(isset($produit_actuel['stock'])) echo $produit_actuel['stock'] ?>">
  </div>
	<?php if(!isset($_GET['action'])){
		echo	'<button type="submit" class="btn btn-primary">Ajouter</button>';
	}else{	?>

	<!-- ucfirst met l'initial em majuscule -->
  <button type="submit" class="btn btn-primary"><?php echo ucfirst($_GET['action']); ?></button>
	<?php }?>
</form>

</div>

<?php require_once('../inc/bas.inc.php'); ?>