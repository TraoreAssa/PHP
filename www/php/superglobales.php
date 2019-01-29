<?php
    session_start(); //demarer la session ($_SESSION)
    session_destroy(); // fermer la session manuellement

    $nomcookies = 'utilisateur';
    $valeurcookies = 'Assa';

    setcookie($nomcookies, $valeurcookies, time()+3600, "/", "assa-traore.fr",false,true);
        //nom du cookies, valeur du cookies, date expiration du cookies(1h), chemin ou le cookies sera accecible(tous le site), site, transmis http securité, bloqué les langage scripter  

    $nomcookies2 = "test";
    $valeurcookies2 = "Ceci est un test";

    setcookie($nomcookies2, $valeurcookies2);
    
    echo $_COOKIE['test'];
    
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SuperGlobalees</title>
</head>
<body>
    <?php
    $nombre1 = 6;
    function Portee(){
        echo $nombre1."la variable ne s'affiche pas <br>";
        $nombre2 = 8;
    }
    Portee();
    echo $nombre1."<br>";
    echo $nombre2."<br><br><br>";

    /* --------------------------------------------------- */

    $x = 10;
    $y = 20;

    function Mult(){
        $GLOBALS['z'] = $GLOBALS['x'] * $GLOBALS['y']; 
        //pour que x et y soit global
    }
    Mult();
    echo $z . '<br><br>';

    
    echo $_SERVER ['PHP_SELF'].'<br>';
    echo $_SERVER ['SERVER_ADDR'].'<br>';
    echo $_SERVER ['SERVER_NAME'].'<br>';
    echo $_SERVER ['SCRIPT_NAME'].'<br>';
    echo $_SERVER ['HTTP_HOST'].'<br>';
    
    // $_REQUEST
    // $_POST vu dans le fornulaire
    // $_GET
    // $_FILES
    // $_ENV


    /* --------------------------------------------------- */

    $_SESSION['prenom'] = "Assa";
    $_SESSION['age'] = 25;
    $_SESSION['sport'] = "danse";
    

  
    ?>
    
</body>
</html>