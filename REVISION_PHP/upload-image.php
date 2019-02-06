<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"crossorigin="anonymous">
    <title>Uplod image</title>
</head>
<body>
    <div class="container">
         <h2 class="display-4 text-center">UPLAOD IMAGE PHP (inserer une image)</h2><hr>

            <?php

                echo '<pre>';    
                print_r($_FILES); //l'image se stock dans $_FILES
                echo '</pre>';    

                $bdd = new PDO('mysql:host=localhost;dbname=revision', 'root', '');

                if(!empty($_FILES['image']['name']))
                {
                    $nom_photo = uniqid() . '-' . $_FILES['image']['name'];
                    //uniqid() permet de définir un identifiant unique
                    // echo 'nom photo :' . $nom_photo . '<br>'; //Nom de la photo

                    $photoBdd = "http://localhost/support_poissy_2018/support-poissy-2018/Php/REVISION_PHP/image/$nom_photo";
                    //on déclare l'URL de la photo/image  qui sera conservé dans la BDD
                    // echo 'Photo Bdd : ' . $photoBdd . '<br> <br>'; //URL de l'image 

                    
                    $photoDossier = $_SERVER['DOCUMENT_ROOT'] . "/support_poissy_2018/support-poissy-2018/Php/REVISION_PHP/image/$nom_photo";
                    //On déclare le chemin physique de la photo, ou elle sera stockée
                    // echo 'Dossier photo : ' . $photoDossier . '<br> <br>';

                    copy($_FILES['image']['tmp_name'], $photoDossier);
                    //Permet de copier la photo / image dans le dossier sur le serveur

                    $resultat = $bdd->exec("INSERT INTO upload (image) VALUES ('$photoBdd')");
                    //Insert en BDD de l'URL de l'image / photo. On ne conserve jamais l'image elle même dans la BDD, ce sreait trop lour pour le serveur
                    
                }

        
            ?>

            <form method="post" action="" enctype="multipart/form-data" class="col-md-6 offset-md-3 text-center" > 
            <!-- multipart/form-data obligatoire pour inserer une image -->
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <small id="emailHelp" class="form-text text-muted">Uploder une image</small>
                </div>
                
                <button type="submit" class="col-md-12 btn btn-dark">Upload</button>

            </form>
            
            <div class="row">
                <?php
                    //Exo : afficher toute les photos uploader en dessous du formulaire
                    $result = $bdd->query("SELECT * FROM upload");
                    //  echo '<pre>';    
                    //  print_r($result); 
                    //  echo '</pre>'; 

                    while($data = $result->fetch(PDO::FETCH_ASSOC)):
                        /* 
                            ()  = recuperer dans la base de données
                            les : remplace les {} pour pouvoir mettre du HTML 
                        */
                        echo '<pre>';    
                        print_r($data); 
                        echo '</pre>';
                    ?>

                        <div class="col-md-6 text-center p-2">
                        <img src="<?= $data['image'] ?>" alt="" class="col-md-6">
                            <!-- reouverture d'une balise php -->
                        </div>

                <?php endwhile; ?>
                    
            </div>
        </div>
</body>
</html>