<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>
<body>
<!-- creer un formulaire de contact qui permet à l'utilisateur d'enregistrer ses contacts dans un fichier :

nom, prenom, adresse, cp, ville et e-mail.

!!!!!!!! Sécuriser votre code !!!!!!!!
!!!!!!!! la doc PHP sera votre meilleure amie !!!!!!!!!
!!!!!!!! Controler les saisies (chaine vide, balises etc.)!!!!!!!!!!!


Valeur de retour :

Nom : JAAGOUB
Prenom : Yassine
Adresse : mon adresse
CP : 78300
Ville : Poissy
E-mail : monemail@gmail.com -->

<form action="" method="post">
      <p><label>nom : <input type="text" name="nom"></label></p>
      <p><label>prenom : <input type="text" name="prenom"></label></p>
      <p><label>adresse : <input type="text" name="adresse"></label></p>
      <p><label>code postal : <input type="text" name="zipcode"></label></p>
      <p><label>ville : <input type="text" name="ville"></label></p>
      <p><label>email : <input type="email" name="email"></label></p>
       <input type="submit" value="valider"> 
</form>
<!--strpos($email, "@") pour s"assurer que l'adresse mail comporte bien un @-->
<?php  

// $nom="";

// if($_POST){
//     $handle = fopen("retour_formulaire.txt","a+");//a inserer dans la fonction if($_POST)

//     if(!empty(htmlspecialchars($_POST['nom']))){
//        echo "bonjour" ." " .htmlspecialchars($_POST['nom']);
//     }else {
//         echo "veuillez renseigner votre nom";
//     }
// }

// //$handle : pointeur de fichier ressource crée avec fopen
// //fopen est une fonction qui cree un nouveau fichier s'il n'existe pas encore

//correction
$content = "";
$informations ="";
//je cree deux variables qui vont contenir les donnees du formulaire
    if($_POST){

        $file = fopen("contact.txt", "a+") or die ("file not open");

        foreach ($_POST as $key => $value) {
            if(empty($value)){
                $content .= "<div class=\"alert alert-danger\"> veuillez remplir les champs " . $key . "</div>";//je definis mes $content ici 
            } else{
                $informations = $key . " : "  . strip_tags($value) . PHP_EOL;
                fputs($file, $informations);
            }
        
        }

        fputs($file, "--------------" . PHP_EOL);

        fclose($file);
    
    }
//les $key correspondent aux name des input
//strip_tags supprime les balises html, securisant ainsi la page. La difference entre strip_tags et htmlspecialchars reside dans le fait que strip_tags supprime les balises là où htmlspecialchars les transforme en caractères spéciaux(&lt et &gt) 
//fputs() à la même fonction que fwrite()
//PHP_EOL sert à faire des sauts de lignes en fin de ligne : PHP_end of line
//ne pas oublier d'inclure fclose() qui ferme le fichier
?>



</body>
</html>