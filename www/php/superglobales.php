<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SuperGlobalees</title>
</head>
<body>
    <?php
    // $nombre1 = 6;
    // function Portee(){
    //     echo $nombre1."la variable ne s'affiche pas <br>";
    //     $nombre2 = 8;
    // }
    // Portee();
    // echo $nombre1."<br>";
    // echo $nombre2."<br><br><br>";

    //---------------------------------------------------

    $x = 10;
    $y = 20;

    function Mult(){
        $GLOBALS['z'] = $GLOBALS['x'] * $GLOBALS['y']; 
        //pour que x et y soit global
    }
    Mult();
    echo $z . '<br><br>';

    
    echo $_SERVER ['PHP_SELF'].'<br>';
    echo $_SERVER [''].'<br>';
    echo $_SERVER [''].'<br>';
    echo $_SERVER [''].'<br>';
    echo $_SERVER [''].'<br>';
    echo $_SERVER [''].'<br>';
    // $_REQUEST
    // $_POST
    // $_GET
    // $_FILES
    // $_ENV
    // $_COOKIE
    // $_SESSION
    
    ?>
    
</body>
</html>