
<?php 
  // ajout produit
  require_once('../inc/init.inc.php');

if(!internauteEstConnecteEtEstAdmin()) header('location:connexion.php');

if($_POST){
 
  $dossier_photo="";
  $dossier_photo= RACINE_SITE."photo/".$_POST['reference'].'_'.$_FILES['photo']['name'];
  $photobdd=$_SERVER['DOCUMENT_ROOT'].$photo_dossier;
  copy($_FILES['photo']['tmp_name'], $photobdd);

  executeRequete("INSERT INTO produit(reference,categorie,titre,description,couleur,taille,public,photo,prix,stock)
  VALUES('$_POST[reference]','$_POST[categorie]','$_POST[titre]','$_POST[description]','$_POST[couleur]','$_POST[taille]','$_POST[public]','$dossier_photo',
  '$_POST[prix]','$_POST[stock]')");
}
 
// affichage produits




?>


<table >
    <tr>
        <th>Reference</th>
        <th>Categorie</th>
        <th>Titre</th>
        <th>Prix</th>

        <th>Photo</th>
        <th>Stock</th>
        

    </tr>
    
    
   <tbody>
   <?php 


  if(isset($_GET['action'])&& $_GET['action']=="affichage"){
      $resultat=executeRequete("SELECT reference,categorie,titre,prix,photo,stock FROM produit");

      while($ligne=$resultat->fetch()){

        $content.='<tr> <td>'.$ligne['reference'].'</td><td>'.$ligne['categorie'].
       '</td><td>'.$ligne['titre'].'</td><td>'.$ligne['prix'].'</td><td><img src="'.$ligne['photo'].'"></td><td>'.$ligne['stock'].'</td></tr>';

      }

      echo $content;
  }
  ?>
   </tbody>


</table>



<a href="<?php echo '?action=affichage' ?>">Affichage Produit</a>

<div class="container-fluid">
	<form method="post" enctype="multipart/form-data" action="">

<input type="hidden" name="id_produit" value="">
  <div class="form-group">
    <label for="reference">Reference Produit</label>
    <input type="text" class="form-control" id="reference" placeholder="la référence du produit" name="reference" value="">
  </div>
  <div class="form-group">
    <label for="categorie">Catégorie</label>
    <input type="text" class="form-control" id="categorie" placeholder="la categorie du produit" name="categorie" value="">
  </div>
  <div class="form-group">
    <label for="titre">Titre du produit</label>
    <input type="text" class="form-control" id="titre" placeholder="le titre du produit" name="titre" value="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="couleur">Couleur</label>
    <input type="text" class="form-control" id="couleur" placeholder="la couleur du produit" name="couleur" value="">
  </div>
  <div class="form-group">
    <label for="taille">Taille</label>
    <select class="form-control" id="taille" name="taille">
      <option value="s">S</option>
      <option value="m" >M</option>
      <option value="l" >L</option>
      <option value="xl" >XL</option>
    </select>
  </div>
  <div class="form-group">
    <label for="public">Sexe</label><br>
   	<input type="radio" id="pubic" name="public" value="m" >Homme<br>
   	<input type="radio" id="public" name="public" value="f" >Femme<br>
   	<input type="radio" id="public" name="public" value="mixte" >Mixte<br>
  </div>
  <div class="form-group">
    <label for="photo">Photo</label>
    <input type="file" id="photo" name="photo">
   
  </div>
  <div class="form-group">
    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" placeholder="prix du produit" value="">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" placeholder="stock du produit" value="">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

</div>