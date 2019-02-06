<?php
//afficher les produits,les titres, les stocks, les references des articles
require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");


$content .='<ul>';
$content .= '<li><a href="?action=&id_produit=' .$affichage['categorie'] . '">T-shirt</a></li>';
$content .='<li><a href="?action=suppression&id_produit=' .$ligne['id_produit'] . '" onClick="return(confirm("Etes-vous certain ?"))">Pull</a></li>';
$content .='</ul>';
//code pour l'affichage des produits:
// $resultat=executeRequete("SELECT reference, titre, prix, stock, photo FROM produit WHERE categorie=$_GET['categorie']");
// $content .='<tbody>';
// while($affichage=$resultat->fetch(PDO::FETCH_ASSOC)){
//     $content .='<tr>';
//     foreach($affichage as $key=>$value){
//         if($key == "photo"){
//             $content .= '<td><img src="' .$value . '"width="70" height="70"></td>';
//         }
//         else {
//             $content .='<td>' . $value . '</td>';
//         }
//     }
//     $content .='</tr>';
// }

?>

<!-- <table class="table">
  <caption>Articles</caption>
  <thead>
    <tr>
      <th scope="col">REFERENCE</th>
      <th scope="col">TITRE</th>
      <th scope="col">PRIX</th>
      <th scope="col">EN STOCK</th>
      <th scope="col">PHOTO</th>
    </tr>
  </thead> -->
  <?php echo $content; ?>
  <!-- <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody> -->
</table>
<?php 
require_once("inc/bas.inc.php");
?>