
<?php
//afficher les produits,les titres, les stocks, les references des articles
require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");

//je recupere mes categories
$habit=executeRequete("SELECT DISTINCT categorie from produit");

$content .='<div class="categories">';
$content .='<ul>';

while($affichage=$habit->fetch(PDO::FETCH_ASSOC)) { 
    $content .='<li><a href="?categorie='.$affichage['categorie'].'">'. $affichage['categorie']. '</a></li>';//j'affiche mes categories disponibles 
}
$content .='</ul>';
$content .='</div>';

//affichage des produits
$content .='<div class="produits">';
if(isset($_GET['categorie'])){
    $donnees=executeRequete("SELECT id_produit, reference, titre, photo, prix FROM produit WHERE categorie='$_GET[categorie]'");

    while($produit=$donnees->fetch(PDO::FETCH_ASSOC)){
   
$content .='<div class="product">';
$content .="<h2>" .$produit['titre'] ."</h2>"; 
$content .='<a href="fiche_produit.php?id_produit=' .$produit['id_produit'].'"><img src="'.$produit['photo'].'"width="130" height="100"></a>';
$content .="<p>" .$produit['prix']. "€</p>";
$content .="<p>REF:" .$produit['reference']. "</p>";
$content .='<a href="fiche_produit.php?id_produit=' .$produit['id_produit'].'">Voir la fiche</a>';
$content .="</div>";


    }
}
//exercice:
//input: pour chercher avec des termes particuliers: SELECT * FROM produit WHERE ... LIKE '%'. Je me cree un input, avec une requete qui recupere des donnees particulieres en partant de l'initiale tapée par exemple
// $content .='<form method="post" action="">';
// $content .='<label for="recherche">Rechercher un article </label>';
// $content .='<input type="text" name="keywords">';
// $content .='<input type="submit" value="rechercher">';
// $content .='<label for="prix">prix : </label>';
// $content .='<select id="prix" name="prix">';
// $prix=executeRequete("SELECT * FROM produit WHERE prix BETWEEN 0 AND 20")
// if(isset($_POST['prix']))


// $content .="</form>";
// lors de l'envoi, liste deroulante des donnees trouvées incluant les conditions de recherche: ex dans mon input je tape 'a', si je valide, j'obtiens une liste deroulante contenant tous les produits de ma bdd commençant par 'a', je choisis alors le produit que je cherchais
 
// if(isset($_POST['keywords']))
// $keywords=executeRequete("SELECT * FROM produit WHERE titre OR description LIKE '%')





?>

 <table class="table">
  <caption>Articles</caption>
  <thead>
    <tr>
      <th scope="col">REFERENCE</th>
      <th scope="col">TITRE</th>
      <th scope="col">PRIX</th>
      <th scope="col">EN STOCK</th>
      <th scope="col">PHOTO</th>
    </tr>
  </thead> 
  <?php echo $content; ?>
  
</table>
<?php 
require_once("inc/bas.inc.php");
?>