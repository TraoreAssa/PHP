<?php   

require_once("inc/init.inc.php");
require_once("inc/haut.inc.php");


//gestion des connexions et des decos selon le statut de l'utilisateur: la fonction est definie dans la page fonction.inc.php et les conditions selon le statut dans navigation.inc.php
if(internauteEstConnecte()) header("location:profil.php");
 //si l'internaute est connecté je le renvoie sur profil 


if(isset($_GET['action']) && $_GET['action'] == "deconnexion"){
  session_destroy();
}
//si l'internaute n'est pas connecté, la session est detruite, il est renvoyé vers la connexion. L'action de deconnexion est definie dans le lien sur la page de navigation : href="'.RACINE_SITE. 'connexion.php?action=deconnexion">deconnexion</a>



if($_POST){
// debug($membre); cette fonction est definie dans ma page fonction.inc et me sert a voir s'il y a un probleme avec ma var membre. Je peux aussi utiliser var_dump($membre); pour voir le contenu de $membre

       $resultat = executeRequete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' AND mdp = '$_POST[mdp]'");//je stocke ma requete dans une var resultat

       $membre = $resultat->fetch(PDO::FETCH_ASSOC);//je stocke mon resultat retourné dans une var $membre.Les param du fetch evitent de recuperer tous les champs en double en prenant en compte les id + l'associatif

       if($membre){//si j'ai bien un membre qui existe avec le mdp et le pseudo entré, alors :
         foreach($membre as $key => $value){//je parcours ses infos...
           if($key != 'mdp'){//...j'arrive a son mdp, et si l'indice est different de mdp alors j'enregistre tout sauf le mdp ...
             $_SESSION['membre'][$key] = $value;
           }//je peux voir ça dans les cookies, en ouvrant la console, phpsessid, valeur, puis j'ouvre mes fichiers et je cherche celui qui correspond.
         }
         header('location:profil.php'); //...et je redirige l'utilisateur vers la page profil
       } else {//mais si l'utilisateur n'existe pas (n'est pas enregistré dans ma bdd), je lui affiche un message d'erreur
         $content .='<div class="alert alert-danger" role="alert">Pseudo et/ou mdp invalide</div>';
       }//ne pas oublier d'appeler ma variable $content en dessous de mon form
}


?>

<div class="card" style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">Connexion</h5>

    <form method="post" action="">
      <div class="form-group">
       <label for="exampleInputPseudo1">Pseudo </label>
       <input type="text" class="form-control" id="exampleInputPseudo1" aria-describedby="pseudoHelp" placeholder="Entrer pseudo" name="pseudo">
      </div>
      <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
       <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="mdp">
      </div>
      <div class="form-group form-check">
    
       <button type="submit" class="btn btn-primary" >Se connecter</button>
      </div>
    </form>

    <?php echo $content; ?><!--ne pas oublier de faire l'appel de ma var $content, sinon le message "pseudo et/ou mdp invalide" ne s'affichera pas-->
  </div>
</div>
<?php require_once("inc/bas.inc.php");  ?>
