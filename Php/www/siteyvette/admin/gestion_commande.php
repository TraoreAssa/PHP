<?php 

require_once("../inc/init.inc.php");
require_once('../inc/haut.inc.php');


// Affichage des commandes passées sur le site
?>
<h2>Commande(s) passée(s) sur le site</h2>
<table class="table">
    <thead>
                <tr>
                    <th scope="col">Numéro de la commande</th>
                    <th scope="col">Date d'enregistrement</th>
                    <th scope="col">Montant d'achat</th>
                    <th scope="col"> Etat de la commande</th>
                    <th scope="col">Details des commandes </th>
                    <th scope="col">Information sur le membre qui a effectué la commande</th>
                </tr>
    </thead>

    <tbody>
         <?php


        // trier les commandes par dates

        if(isset($_GET['action'])&& $_GET['action']=="trier_date"){

            $resultat= executeRequete("SELECT id_commande,date_enregistrement,montant,etat,id_membre FROM commande ORDER BY date_enregistrement");

        }elseif((isset($_GET['action'])&& $_GET['action']=="trier_mont")){

            $resultat= executeRequete("SELECT id_commande,date_enregistrement,montant,etat,id_membre FROM commande ORDER BY montant ");
        }elseif((isset($_GET['action'])&& $_GET['action']=="trier_etat")){

            $resultat= executeRequete("SELECT id_commande,date_enregistrement,montant,etat,id_membre FROM commande ORDER BY etat ");
        }
         else
            {
            $resultat= executeRequete("SELECT id_commande,date_enregistrement,montant,etat,id_membre FROM commande");
           

        }

            
           
             while ($ligne=$resultat->fetch(PDO::FETCH_ASSOC)){
                $CA=0;
        ?>

                <tr>
                    <td><?php echo $ligne['id_commande'] ;?></td>
                    <td><?php echo $ligne['date_enregistrement'] ; ?></td>
                    <td><?php echo $ligne['montant'] ; ?></td>
                    <td>
                        <form method="post">
                                <input type="hidden" name="commande" value="<?php echo $ligne['id_commande']?>">
                                <select name="etat" >
                                
                                <option value="<?php echo $ligne['etat']?>"><?php echo $ligne['etat']?></option>
                                <option value="Envoyé">Envoyé</option>
                                <option  value="En cours de traitement">En cours de traitement</option>
                                <option  value="Livré">Livré</option>
                                
                                </select>
                                
                            
                                <input type="submit" value="modifier">
                        </form>
        
    
                    </td>
                    <td><a href="?id_commande=<?php echo $ligne['id_commande'] ?>">Detail commande </a></td>
                    <td><a href="?id_membre=<?php echo $ligne['id_membre'] ?>">membre ayant effectué la commande</a></td>
                 </tr>
    
        <?php
        $CA=$CA+$ligne['montant'];

         }
         ?>
    </tbody>
</table>


<?php


/* fonctionnement des relations entre tables table a et b lié par une cle etrangere ie un element commun
 sinon table a et b lié par une table c ie table   a et c on un element commun et table b et c ont un element commun */

// affichage des produits correspondant a chaque id_commande ie detail des commandes
if(!empty($_GET['id_commande'])){
 
   $resultat1= executeRequete("SELECT d.id_produit, d.id_details_commande FROM details_commande d WHERE d.id_commande= '$_GET[id_commande]' ");
 
 
   ?>

 
   
   <h4>detail de la commande selectionnée</h4>
<table border="1">

     <tr>
         <th>Titre</th>
         <th>photo</th>
         <th>Quantité</th>
     
     </tr>

    <?php 
    $donne1=$resultat1->fetch(PDO::FETCH_ASSOC);
       
         $resultat2= executeRequete("SELECT p.titre,p.photo,d.quantite FROM produit p, details_commande d WHERE p.id_produit='$donne1[id_produit]' and id_details_commande='$donne1[id_details_commande]' ");

        $donne2=$resultat2->fetch(PDO::FETCH_ASSOC);?>
        

    <tr>
            
            <td><?php echo $donne2['titre'] ;?></td>
            <td><img width="70" height="70" src="<?php echo $donne2['photo'] ;?>"></td>
            <td><?php echo $donne2['quantite'] ; ?></td>
    </tr>
    
    <?php 
        
    
     
}
    ?>
   
</table>


   <!-- affichage des informations sur le membre qui a commandé  pour lui envoyé ses colis-->

    <?php 
    

    if(!empty($_GET['id_membre'])){
    
        

        $resultat3=executeRequete("SELECT c.id_commande,m.id_membre,m.pseudo,m.adresse,m.ville,m.code_postal,m.email FROM membre m,commande c WHERE m.id_membre='$_GET[id_membre]'");

        $donne3=$resultat3->fetch(PDO::FETCH_ASSOC);

       
    
    
    ?>

        <h4>affichage du membre qui a passé la commnde à partir du numero de  la commande</h4>

        <table border="1">
            <tr>
                <th>Numero de la commande</th>
                <th>Numero du membre</th>
                <th>pseudo du membre</th>
                <th>Son adresse</th>
                <th>Sa ville</th>
                <th>Son Code Postal</th>
                <th>Email</th>
            </tr>
        
            <tr>
            <td><?php echo $donne3['id_commande'] ;?></td>
            <td><?php echo $donne3['id_membre'] ;?></td>
            <td><?php echo $donne3['pseudo'] ;?></td>
            <td><?php echo $donne3['adresse'] ;?></td>
            <td><?php echo $donne3['ville'] ;?></td>
            <td><?php echo $donne3['code_postal'] ;?></td>
            <td><?php echo $donne3['email'] ;?></td>
            
            </tr>
        </table>
    <?php }
    
  



    // changement d'etat de envoie de la commande

    if($_POST){

       
     executeRequete("UPDATE commande SET etat='$_POST[etat]' WHERE id_commande='$_POST[commande]'");

    //  pour recharger la page et eviter de cliquer deux fois pour effectuer les modif sur la page
       

     echo"<script>window.location.href='gestion_commande.php'</script>";
        

    }


    

    // le chiffre d'affaire de la société

  
    ?>


<h3>Le Chiffre d'Affaire:  <?php echo $CA;?> </h3>
<ul>
        <li> <a href="?action=trier_date">Ranger par dates </a></li>

        <li> <a href="?action=trier_mont">Ranger par Montant </a></li>

        <li> <a href="?action=trier_etat">Ranger par Etat </a></li>


</ul>

  



    
   <?php require_once('../inc/bas.inc.php');?>
<!-- variable datetimezone pour modiffier  le fuseau horaire dans php init-->
