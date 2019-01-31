<?php
// techniquement on va le garder dans une session  et pas en bdd car le panier va peut etre abandonner

// fichier de session pour sauvegarder de page en page mais pas en bdd car on ne sait pas si l'utilisateur va valider le panier, donc pour ne pas alourdir notre bdd


require_once("inc/init.inc.php");

//AJOUTER ARTICLES DANS NOTRE VARIABLE SESSION PANIER
if(isset($_POST['ajouter_panier']))
{
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_POST[id_produit]'");

    $produit = $resultat->fetch(PDO::FETCH_ASSOC);

    ajouterProduitDansPanier($produit['titre'], $_POST['id_produit'], $_POST['quantite'], $produit['prix']);
}


//VIDER PANIER
if(isset($_GET['action']) && $_GET['action'] == "vider"){
        unset($_SESSION['panier']);
}


//ACTION DE PAYER
if(isset($_POST['payer']))
{
    for ($i=0; $i < count($_SESSION['panier']['id_produit']); $i++) { 
        
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit=" . $_SESSION['panier']['id_produit'][$i]);
        $produit = $resultat->fetch(PDO::FETCH_ASSOC);

        //CONTROLE DES STOCKS
        if($produit['stock'] < $_SESSION['panier']['quantite'][$i])
        {
            $content .= '<div class="alert alert-warning role="alert">Stock restant : ' . $produit['stock'] . '</div>';
            $content .= '<div class="alert alert-warning role="alert">Quantité demandée : ' . $_SESSION['panier']['quantite'][$i] . '</div>';
            if($produit['stock'] > 0){
                $_SESSION['panier']['quantite'][$i] = $produit['stock'];
                $content .= '<div class="alert alert-warning role="alert">la quantité du produit : ' . $_SESSION['panier']['id_produit'][$i] . ' a été réduite car notre stock était insuffisant, veuillez vérifier vos achats</div>';
            }
            else {
                $content .= '<div class="alert alert-danger role="alert">Le produit : ' . $_SESSION['panier']['id_produit'][$i] . ' a été retiré de votre panier car nous sommes en rupture de stock, veuilez verifier vos achats</div>';
                retirerProduitPanier($_SESSION['panier']['id_produit'][$i]);
                $i--;
            }
            $erreur = true;
        }
    }


    //SI L'ACHAT SE PASSE SANS ERREUR (disponible, utilisateur connecté etc.)
    if(!isset($erreur)){
        executeRequete("INSERT INTO commande (id_membre, montant, date_enregistrement) VALUES ('".$_SESSION['membre']['id_membre']. "','" . montantTotal() . "', NOW())");

        //lastInsertId() ---> Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence
        $id_commande = $bdd->lastInsertId();
        for ($i=0; $i < count($_SESSION['panier']['id_produit']) ; $i++) { 
            executeRequete('INSERT INTO details_commande (id_commande,id_produit, quantite,prix) VALUES("'. $id_commande . '","'. $_SESSION['panier']['id_produit'][$i].'","' .$_SESSION['panier']['quantite'][$i] . '","' . $_SESSION['panier']['prix'][$i] .'")');

            //ON MET A JOUR LES STOCKS DISPONIBLE
            executeRequete('UPDATE produit SET stock = stock - "' . $_SESSION['panier']['quantite'][$i] . '" WHERE id_produit = "' . $_SESSION['panier']['id_produit'][$i] . '"');
        }


        //ON VIDE LE PANIER APRES AVOIR VALIDER SON ACHAT
        unset($_SESSION['panier']);

        $content .=  '<div class="alert alert-success role="alert">Merci pour votre commande, votre n° de suivi est le : '. $id_commande .'</div>';
    }
}

echo $content;

//AFFICHAGE HTML

require_once("inc/haut.inc.php");

?>
<table border="1" style="border-collapse:collapse" cellpadding="7">
    <tr>
         <td colspan="5">Panier</td>
    </tr>
    <tr>
        <th>Titre</th>
        <th>Produit</th>
        <th>Quantité</th>
        <th>PrixHT</th>
        <th>PrixTTC</th>
    </tr>
<?php 
                if(empty($_SESSION['panier']['id_produit']))
                {

                    echo '<tr><td colspan="5">Votre panier est vide</td></tr>';

                 } 
                 else {
                        for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
                        {

                            // ici la tva est de 19.5%

                            $prixuTTc=$_SESSION['panier']['prix'][$i]*1.195;

                            $prixHT=montantTotal()*1.195;

                            $prixTTc=round($prixHT,2);

                            $ident=$_SESSION['panier']['id_produit'][$i] ;

                            // afficher la photo du produit

                            $result=executeRequete("SELECT photo FROM produit WHERE id_produit= $ident");
                            
                            $photo= $result->fetch(PDO::FETCH_ASSOC);

                        // l'internaute peut changer les quantité sur la page panier
 ?>

    <tr>
        <td><?php echo $_SESSION['panier']['titre'][$i] ;?> </td>

        <td><img src="<?php echo $photo['photo'];?>" width="70" height="70" alt="photo produit"></td>

        <td>
            
            <?php echo $_SESSION['panier']['quantite'][$i] ;?>  
        </td>

                    
            

        <td><?php echo $_SESSION['panier']['prix'][$i] ;?> </td>

        <td><?php echo $prixuTTc ;?></td>

    </tr>
    <?php } ?>

        <tr>
            <th colspan='3'>Total</th>
            <td><?php echo montantTotal();?> euros</td>
            <td><?php echo $prixTTc; ?> euros</td> 
        </tr>

    <?php if(internauteEstConnecte()){ ?>
            <form method="post" action="">
                <tr>
                    <td colspan="5"><input type="submit" name="payer" value="valider mon paiement"></td>
                </tr>
            </form>
     <?php 
     } 
     else {
            echo '<tr><td colspan="3">Veuillez vous inscrire ou vous connecter afin de finaliser votre paiement</td></tr>';
    } 
    ?>

    <tr><td colspan="5"><a href="?action=vider">Vider mon panier</a></td></tr>
    <?php } ?>

</table><br>

<i>Règlement par chèque uniquement à l'adresse suivante : 300 rue de la maladrerie 78300 Poissy</i><br>

<hr>session panier.php : <br>

<?php require_once('inc/bas.inc.php');?>