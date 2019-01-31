<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MySQL</title>
</head>
<body>
    <?php
    $serveur = "localhost";
    $login = "root";
    $pass = "";

    // try{
    //     //-------------Entree dans le BDD deja créer------------------------

    //     $connexion = new PDO("mysql:host=$serveur; dbname=test", $login, $pass);
    //     $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    //     echo 'Connexion a la base de donnée réusssie';
    
    // }
    
    // catch(PDOEExecption $e){
    //     echo 'Echec de la connexion : ' .$e -> getMessage();
    // }

    // try{
    //     //------------------Créer une BDD------------------------- 

    //     $connexion = new PDO("mysql:host=$serveur", $login, $pass);
    //     $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $connexion ->exec("CREATE DATABASE test2");//creation de la BDD
    //     echo 'Nouvelle BDD créer';
    // }
    
    // catch(PDOEExecption $e){
    //     echo 'Echec de la connexion : ' .$e->getMessage();
    // }

    
    try{
        //---------------Entree dans le BDD deja créer------------------

        $connexion = new PDO("mysql:host=$serveur; dbname=test2", $login, $pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

        // ----------------------Créer une nouvelle Table ------------------------
        // $codesql = "CREATE TABLE Visiteurs(
        //     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     nom VARCHAR(50),
        //     prenom VARCHAR(50),
        //     email VARCHAR(70)
        // )";
        // $connexion->exec($codesql);
        // echo 'Nouvelle Table Visiter créer';

        $insertion = "INSERT INTO Visiteurs(nom,prenom,email)
                        VALUES('Traore','Assa','assa.traore@lepoles.com')";
        $connexion ->exec($insertion);
        echo 'Valeurs';

    }
    catch(PDOEExecption $e){
            echo 'Echec de la connexion : ' .$e->getMessage();
        }


    
    ?>
</body>
</html>