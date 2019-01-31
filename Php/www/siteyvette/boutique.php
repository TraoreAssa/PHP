<?php
require_once('inc/init.inc.php');

require_once('inc/haut.inc.php');
//AFFICHAGE CATEGORIES
		$cat_produit = executeRequete("SELECT DISTINCT categorie FROM produit");
?>
<div class="main-boutique">
			<div class="categories">
				<ul>

					<?php while($cat = $cat_produit->fetch(PDO::FETCH_ASSOC))
							{
					?>			
								<li><a href="?categorie=<?php echo $cat['categorie'].'">'. $cat['categorie'] .'</a></li>';?>
					<?php 
							}

							//AFFICHAGE DES PRODUITS
					?>

				</ul>
			</div>


			<div class="produits">

				<?php if(isset($_GET['categorie']))
				{
						
							$donnees = executeRequete("SELECT id_produit, reference,titre,photo,prix FROM produit WHERE categorie = '$_GET[categorie]'");

							while($produit = $donnees->fetch(PDO::FETCH_ASSOC))
							{
				?>
								<div class="product">

									<h2> <?= $produit['titre'] ?></h2>

									<a href="fiche_produit.php?id_produit=<?= $produit['id_produit'] . '"><img src="'. $produit['photo'] .'" width="130" height="100"></a>';?>

									<p> <?= $produit['prix'] . "€</p>"; ?>

									<p> Réf : <?= $produit['reference'] ; ?> </p>

									<a href="fiche_produit.php?id_produit= <?= $produit['id_produit'] .'">Voir la fiche</a>'; ?>
								</div>
						<?php 
							}

			
			} 			?>

			</div>


</div>
<?php require_once('inc/bas.inc.php');?>
