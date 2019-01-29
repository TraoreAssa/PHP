<?php 

if(isset($_GET['pays'])) {
    $pays = $_GET['pays'];
} else if(isset($_COOKIE['pays'])) {
    $pays =$_COOKIE['pays'];
} else {
    $pays = 'fr';
}

$expiration = 365*24*3600;
setcookie('pays', $pays, time()+$expiration);

?>

<ul>
<li><a href="?pays=fr">French</a></li>
<li><a href="?pays=es">Spain</a></li>
<li><a href="?pays=en">English</a></li>
</ul>


<?php

switch ($pays) {
    case 'fr':
    echo "<p>Bonjour et bienvenue sur mon site </p>";
    break;
    case 'en':
    echo "<p>Hi ! Welcome to my website </p>";
    break;
    case 'es':
    echo "<p>Bienvenidos a mi website </p>";
    break;
    default:
    echo "<p>Bonjour et bienvenue sur mon site </p>";
    break;
}

?>