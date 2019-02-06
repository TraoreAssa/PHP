<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
            crossorigin="anonymous">
        <title>Cookies PHP</title>
    </head>
    <body>

        <div class="container">
            <h2 class="display-4 text-center">Cookies PHP</h2>

            <a href="?pays=fr">France</a><br>
            <a href="?pays=it">Italie</a><br>
            <a href="?pays=pt">Portugal</a><br>
            <a href="?pays=es">Espagne</a><br>

            <?php
            
                if(isset($_GET['pays']))//on tombe dans la condition losque l'on a cliqué sur un lien
                {
                    $pays = $_GET['pays'];
            
                }
                elseif(isset($_COOKIE['pays']))//on tombe dans le elseif dans le cas ou un pays a été conservé dans le fichier 'cookie'
                {
                    $pays = $_COOKIE['pays'];
                    //conserve le cookies

                }
                else //on tombe dans le else seulement dans le cas de la premiere visite sur le site
                {
                    $pays = 'fr';
                }

                // echo time(); seconde depuis le 1/01/1970
                $un_an = 365*24*3600; // un an en seconde

                // 3 arguments : nom du cookie /  valeur du cookie / durée de vie 
                setcookie('pays', $pays, time()+$un_an);

                switch($pays)
                {
                    case 'fr':
                    echo "Vous êtes sur un site en Français !! <br>";
                    break;
                    case 'it':
                    echo "Vous êtes sur un site en italien !! <br>";
                    break;
                    case 'pt':
                    echo "Vous êtes sur un site en Portugais !! <br>";
                    break;
                    case 'es':
                    echo "Vous êtes sur un site en Espagnol !! <br>";
                    break;

                }
            ?>

        </div>
        
    </body>
</html>