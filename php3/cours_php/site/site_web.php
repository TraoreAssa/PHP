<?php  
//creation d'un site complet : CRUD :create, read , update, delete, ou creer, lire, modifier, supprimer



//extrait de la page boutique.php
// $resultat=executeRequete("SELECT  DISTINCT reference, titre, prix, stock, photo FROM produit WHERE categorie= $_GET['categorie']");
// $content .='<tbody>';
//  while($affichage=$resultat->fetch(PDO::FETCH_ASSOC)) { 
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
//     }
// }

// if(internauteEstConnecteEtEstAdmin()){
//  if(isset($_GET['action']) && ($_GET['action'])=="modification"){
//     $resultat=executeRequete("SELECT * FROM membre ");
//     $statut_a_modifier=$resultat->fetch(PDO::FETCH_ASSOC);
   
//  var_dump($statut_a_modifier);
//    if(isset($statut_a_modifier)){
//      executeRequete("UPDATE membre SET statut='1' WHERE pseudo='$_POST[pseudo]'");
//     $content .='<div class="alert alert-success" role="alert">Le statut du membre a bien été modifié </div>';
//     } else {
//         $content .='<div class="alert alert-danger" role="alert">Le statut du membre n\'a pas été modifié </div>';
//     }
// }
//  }


 // if(isset($_GET['action']) && ($_GET['action'] == 'effacer'){
// $resultat=executeRequete("SELECT * FROM membre");
// $membre_a_desinscrire= $resultat->fetch(PDO::FETCH_ASSOC);
//executeRequete("DELETE FROM membre WHERE pseudo=$_GET[pseudo]");

//$content .='<div class="alert alert-danger" role="alert">Le membre a bien été effacé </div>';
//    }
// }
// <div class="container">
// <div class="card" style="width: 18rem;">
  
//   <div class="card-body">
//     <h5 class="card-title">Modification statut ou Suppression membre</h5>

//     <form method="post" action="">
//       <div class="form-group">
//        <label for="exampleInputPseudo1">Pseudo </label>
//        <input type="text" class="form-control" id="exampleInputPseudo1" aria-describedby="pseudoHelp" placeholder="Entrer pseudo" name="pseudo">
//       </div>
//       <div class="form-group">
//        <label for="exampleInputName1">Nom</label>
//        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom" name="nom">
//       </div>
//       <div class="form-group">
//        <label for="exampleInputPrenom1">Prenom</label>
//        <input type="text" class="form-control" id="exampleInputPrenom1" placeholder="Prenom" name="prenom">
//       </div>
//       <div class="form-group">
//        <label for="exampleInputPassword1">Statut membre</label>
//        <input type="text" class="form-control" id="exampleInputStatut1" placeholder="Statut" name="statut">
//       </div>
//       <a href="?action=modification">Modification</a><br>
//       <a href="?action=suppression">Suppression</a>
//     </form>
//     </div> -->
    
    
    //  je peux creer une liste deroulante contenant le nom des membres
// $content .='<form method="post" action="effacer">';
// $content .='<input type="hidden" name="id_membre" value="' .$membre['id_membre'].'">';
// $content .='<label for="membres">Membres inscrits : </label>';
// $content .= '<select id="membres" name="membre">';
// $inscrits = $membre['nom'];
// for($i = 1; $i <= $inscrits; $i++)
// {
//     $content .= "<option>" . $i . "</option>";
// }
// $content .= "</select>";

//  $content .= '<input type="submit" name="effacer" value="Supprimer"><br>';
//  $content .="</form>";
// }
//  if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action']=="modification")){
//      if(isset($_GET['id_produit'])){
//        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = $_GET[id_produit]");
//       $produit_actuel=$resultat->fetch(PDO::FETCH_ASSOC);
//     }
//     } -->

?>