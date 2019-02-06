<?php 

function executeRequete($req){//recoit en argument la requete sql qui arrivera dans la fonction
    global $bdd;//permet d'avoir acces a la variable definie dans init.inc.php $bdd

    $result = $bdd->query($req);
    if(!$result){
        die('Erreur sur la requete sql.<br>Message : ' . $bdd->error() .'<br>Code: ' . $req);
    }

    return $result;
}

 function debug($d, $mode = 1){//param1= variable a debuguer, param2 :mode a definir pour la condition qui suit
     echo '<div class="alert alert-warning" role="alert">';
     $trace = debug_backtrace();//recupere les erreurs eventuelles du fichier
     echo "debug demandé dans le fichier " . $trace[0]['file'] . ' à la ligne ' . $trace[0]['line'];
     if($mode === 1){
         echo "<pre>"; print_r($d); echo "</pre>";
     } else {
         var_dump($d);
     }
     echo "</div>";
 }
//ex debug(MaVariable,1); prendra en compte la variable qui s'appelle MaVariable, et le mode correspond a ce que la fonction debug doit executer si c'est = a 1, donc echo "<pre>"; print_r($d); echo "</pre>"; sinon var_dump($d);

function internauteEstConnecte(){
    if(!isset($_SESSION['membre'])) return false;
    else return true;
}
//si mon internaute est connecté , retourne true, s'il n'est pas enregistré, retourne false


function internauteEstConnecteEtEstAdmin(){
    if(internauteEstConnecte() && $_SESSION['membre']['statut']==1) return true;
    else return false;
}
//si mon internaute est connecté et qu'il est admin, retourne vrai, sinon retourne false
?>