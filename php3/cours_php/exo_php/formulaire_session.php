<?php  

session_start();

if($_POST){
    $_SESSION['pseudo'] = $_POST['pseudo'];
}
if(isset($_SESSION['pseudo'])){
    echo "votre pseudo est : ".$_SESSION['pseudo'];
} else {
    echo '<form method ="post" action="">
           <label>Pseudo</label>
           <input type="text" name="pseudo"><br>
           <input type="submit" value="envoyer">
           </form>';
}

//ce code signifie que, lorsque je clique, si ma variable pseudo est definie, alors affiche moi "votre pseudo est + pseudo", sinon, affiche moi un formulaire. 
//pour ravoir un formulaire, je dois effacer le cookie (dans ma console ca correspond a phpsessid, et pour l'effacer je vais dans mes parametres de confidentialite et de securite du navigateur)
?>