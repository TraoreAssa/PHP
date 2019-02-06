<?php  
require_once('../inc/init.inc.php');
require_once('../inc/haut.inc.php');
if(!internauteEstConnecteEtEstAdmin()) header("location:../connexion.php");
//dans cette page ajouter la possibilite à l'administrateur de pouvoir supprimer un membre inscrit sur le site. lui donner aussi la possibilité d'ajouter d'autres comptes "administrateur".
$membres=$bdd->query("SELECT * FROM membre");
while ($inscrits=$membres->fetch()){
  ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">pseudo</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">statut</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $inscrits['id_membre'] ?></th>
      <td><?php echo $inscrits['pseudo'] ?></td>
      <td><?php echo $inscrits['nom'] ?></td>
      <td><?php echo $inscrits['prenom'] ?></td>
      <td><?php echo $inscrits['statut'] ?></td>
      <td><a href="?action=suppression">Supprimer le compte</td>
      <td><a href="?action=modification&id_produit=<?= $statut_a_modifier['id_membre']?>">Modifier le statut</td>
    </tr>
    <!-- <tr>
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
    </tr> -->
  </tbody>
</table>
<?php
}
if(internauteEstConnecteEtEstAdmin()){
   if(isset($_GET['action']) && ($_GET['action'])=="modification"){
      $resultat=executeRequete("SELECT * FROM membre ");
      // $statut_a_modifier=$resultat->fetch(PDO::FETCH_ASSOC);
      $statut_a_modifier=$_GET['id_membre']  ; 
   var_dump($statut_a_modifier);
   if(isset($statut_a_modifier)){
     while($statut_a_modifier=$resultat->fetch(PDO::FETCH_ASSOC)) { 
     
            foreach($statut_a_modifier as $key=>$value){
              if($key == "id_membre"){
                 executeRequete("UPDATE membre SET statut='1' WHERE id_membre='$_GET[id_membre]'");
              }
            } 

            // $content .= '  <td><a href="?action=suppression">Supprimer le compte</td>';
            // $content .= '  <td><a href="?action=modification&id_produit=' .$statut_a_modifier['id_membre'] . '">Modifier le statut</td>';
     }
   }
  
  
   // if(isset($_GET['action']) && ($_GET['action'] == 'effacer'){
  // $resultat=executeRequete("SELECT * FROM membre");
  // $membre_a_desinscrire= $resultat->fetch(PDO::FETCH_ASSOC);
  //executeRequete("DELETE FROM membre WHERE pseudo=$_GET[pseudo]");
  
  //$content .='<div class="alert alert-danger" role="alert">Le membre a bien été effacé </div>';
      }
   }
?>
<!-- while($ligne =$resultat->fetch(PDO::FETCH_ASSOC)){//je parcours chaque ligne de mon tableau avec fetch et en ayant le nom des index avec fetch_assoc
             $content .='<tr>';
             foreach($ligne as $key => $value) {
                 if($key == "photo"){
                     $content .= '<td><img src="' .$value . '"width="70" height="70"></td>';
                 }
                 else {
                     $content .='<td>' . $value . '</td>';
                 }
             }

             $content .= '<td><a href="?action=modification&id_produit=' .$ligne['id_produit'] . '">Modification</a></td>';
             $content .='<td><a href="?action=suppression&id_produit=' .$ligne['id_produit'] . '" onClick="return(confirm("Etes-vous certain ?"))">Suppression</a></td>';
         }
     } -->
