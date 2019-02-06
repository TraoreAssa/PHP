<!--cas pratique :-->
<?php  

// if(!empty($_GET['pays'])){
//     echo "code pays : " .$_GET['pays'];
// } ce code affiche dans l'url le code de la langue definie


if(isset($_GET['pays'])){//condition 1: me permet de savoir si la condition est definie
    $pays = $_GET['pays'];//si elle est definie, stocke la
}elseif (isset($_COOKIE['pays'])){//si un pays nommé cookie existe sur l'ordi de l'utilisateur alors on la recupere et on la stocke
    $pays = $_COOKIE['pays'];
}else{//si les conditions precedentes n'ont pas ete remplies alors affiche 'fr' apr defaut
    $pays= 'fr';
}

$expiration = 365*24*3600;
setcookie("pays",$pays,time()+$expiration);
?>


<ul>
    <li><a href="?pays=fr">French</a></li>
    <li><a href="?pays=es">Spain</a></li>
    <li><a href="?pays=en">English</a></li>
    <li><a href="?pays=it">Italian</a></li>
</ul>
<!--"?pays=fr" ... sont les valeurs que je recupere dans ma condition
<?php 

switch ($pays) {
    case 'fr':
    echo "<p>Bonjour bienvenue sur mon site</p>";
    break;
    case 'en':
    echo "<p>Hello welcome to my website</p>";
    break;
    case 'es':
    echo "<p>Bienvenidos a mi website</p>";
    break;
    default:
    echo "<p>Bonjour bienvenue sur mon site</p>";
    break;
}





?>