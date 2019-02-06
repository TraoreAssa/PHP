<?php 

//une session est un systeme mis en oeuvre dans le code php permettant de conserver sur le serveur, dans un fichier temporaire, des informations

//avantages: les données sont enregistrées dans un fichier sur le serveur disponible et consultable par toutes les pages durant la navigation de l'internaute.
// ex dans un site e-commerce, nous n'enregistrons pas les produits ajoutés au panier dans une base de données tant que l'achat n'est pas fait car cela surchargerait la base de données

//les sessions php permettent de conserver des infos sur un internaute côté serveur. Sans ce mecanisme on ne pourrait pas connecter un internaute à notre site web et maintenir sa connexion durant la navigation de page en page

//Il faut d'abord creer un fichier de session,puis lire un fichier de session existant. Pour cela, la méthode utilisée est la méthode predefinie session-start()  (cree ou lit un fichier s'il existe deja)

//creation d'un fichier de session
session_start();

//pour resumer, session_start() permet de creer un fichier de session (ou de l'ouvrir s'il existe deja) mais aussi de creer un cookie (ou s'il existe deja de le relier à un fichier de session deja existant).
//il faut toujours utiliser session_start() et le placer au plus haut dans la page, avant meme le doctype html. Il en va de meme pour les cookies, on les indique juste apres la session
$_SESSION['pseudo']="kirikou";
$_SESSION['mdp']="supercool";

echo "<pre>";
print_r($_SESSION) ; 
echo "</pre>";

unset($_SESSION['mdp']);

echo "<pre>";
print_r($_SESSION) ; 
echo "</pre>";

session_destroy();

echo "<pre>";
print_r($_SESSION) ; 
echo "</pre>";


//Pour vider une partie de session on utilise la fonction unset()
//pour supprimer  on utilise la fonction session_destroy();

//une session a une durée de vie, son parametrage  se fait lors de sa declaration cote php ou cote serveur dans le fichier php ini: session.gc_maxlifetime=1440
// ex:   
 session_start();
      echo "temps actuel " . time()."<br>";//je cree ma session et j'affiche le temps actuel
      print "<pre>";  
      print_r($_SESSION) ;
      print "</pre>";

         if(isset($_SESSION['temps'])) {

             if(time()>($_SESSION['limite'] + $_SESSION['temps'])) {//si tps actuel est sup a tmps actuel + tms connecté, alors deco
                 session_destroy();
                 echo "deconnexion";
             } else {//si tps actuel est inf a tmps actuel + tms connecté, alors mise a jour
                 $_SESSION['temps'] = time();
                 echo "connexion mise a jour";
             }

         } else {
             echo "connexion";
             $_SESSION['limite']=20;
             $_SESSION['temps']=time();
         }

         //si la session temps existe, alors mets en oeuvre la  condition : si le tpms actuel est sup au temps de la session ouverte , alors detruit la session et actualise. Si la session temps n'existe pas, alors cree la puis reprend la condition precedente.

         //php.ini : on trouve :
        // session.use_cookies=1 cette valeur permet de preciser que la valeur d'identifiant de session sera transmise par un cookie. Les autres moyens de transmettre l'identifiant de session seront interdits et refusés.

        //session.use_trans_sid=0 permet de dire que les adresses refuseront cet argument en url
?>
