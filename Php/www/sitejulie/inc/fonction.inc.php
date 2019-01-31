<?php

function executeRequete($req) {
    global $bdd;
    $result = $bdd->query($req);
    if(!$result) {
        die('Erreur sur la requete sql. <br>Message : ' . $bdd->error() . "<br>Code : " . $req);
    }
    return $result;
}

function debug($d, $mode = 1) {
    echo '<div class="alert alert-info" role="alert">';
    $trace = debug_backtrace();
    echo "Debug demandé dans le fichier " . $trace[0]['file'] . " à la ligne " . $trace[0]['line'];
    if($mode === 1) {
        echo "<pre>"; print_r($d); echo "</pre>";
    } else {
        var_dump($d);
    }
    echo "</div>";
}

function internauteEstConnecte() {
    if(!isset($_SESSION['membre'])) return false;
    else return true;
}

function internauteEstConnecteEtEstAdmin() {
    if(internauteEstConnecte() && $_SESSION['membre']['statut']==1) return true;
    else return false;
}