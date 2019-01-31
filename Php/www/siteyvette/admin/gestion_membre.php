<?php
/* Dans cette page ,ajoutez la possibilité à l'administrateur de pouvoir supprimer un membre
 inscrit sur le site .Donnez lui aussi la possibilité 
 d'ajouter d'autres comptes "administrateur".*/

//  supprimer un membre


require_once('../inc/init.inc.php');
require_once('../inc/haut.inc.php');

if(!internauteEstConnecteEtEstAdmin()) header('location:../connexion.php');



if(isset($_GET['action']) && $_GET['action']=="supprimer"){

// en sql on met la cle du champ dans les crochet sans cote et on entoure de cote la variable
        $resultat=executeRequete("SELECT * FROM membre WHERE id_membre='$_GET[id_membre]'");
        $donne=$resultat->fetch(PDO::FETCH_ASSOC);
    
        if(empty( $donne)){
            echo "vous n'etes pas inscrit";
        }else{
            executeRequete("DELETE FROM membre WHERE id_membre='$_GET[id_membre]'");
        }
        
    
    
    }


// ajout de d'autre compte administrateur

if(isset($_GET['action'])&& $_GET['action']==1){


    executeRequete("UPDATE membre SET statut='$_GET[action]' WHERE id_membre='$_GET[id_membre]' ");
    
             
}



?>
<h2>Affichage des membres</h2>


<?php

 $ensemble=executeRequete("SELECT * FROM membre");?>

<div class="container-fluid">

<p>Nombre de personne(s) incrite(s) sur le site: <?php echo $ensemble->rowCount();?></p>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adresse</th>
            
            <th scope="col">Code Postal</th>

            <th scope="col">Ville</th>
            <th scope="col">Civilité</th>
            <th scope="col">Email</th>
            <th scope="col">Statut</th>
            <th scope="col">Supprimer</th>
            <th scope="col">Modifier le statut</th>
           

        </tr>
 
     
    </thead> 
    
    
   <tbody>
   
    <?php
    while($ligne= $ensemble->fetch(PDO::FETCH_ASSOC)){

        // affichage membre inscrit sur le site

       $content.='<tr> <td>'.$ligne['nom'].'</td><td>'.$ligne['prenom'].
       '</td><td>'.$ligne['adresse'].'</td><td>'.$ligne['code_postal'].'</td><td>'.
        $ligne['ville'].'</td><td>'.$ligne['civilite'].'</td><td>'.$ligne['email'].'</td><td>'.
        $ligne['statut'].'</td><td><a href="?action=supprimer&id_membre='.$ligne['id_membre'].'">Supprimer</a></td><td><a href="?action=1&id_membre='.$ligne['id_membre'].'" >Modifier</a> </td></tr>
        ';

    }
    echo $content;
    ?>    
   </tbody>


</table>

</div>

<?php require_once('../inc/bas.inc.php');?>