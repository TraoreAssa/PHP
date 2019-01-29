<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>La Méthode POST</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    </head>

    <body>
        <form action="post.php" method="post">
        <p><label for="">Prénom : <input type="text" name="pseudo"></label></p>
        <p><label for="">Mot de passe : <input type="password" name="mdp"></label></p>
        <input type="submit" value="valider">
        </form>

        <?php

        if( $_POST['mdp'] == "lepoles"){
            echo "<div class='alert alert-success' role='alert'>
            Bienvenue" . $_POST['pseudo'] . "</div>";
        } else {
            echo '<div class="alert alert-danger" role="alert">
            Le mot de passe est incorrect. </div>';
        }

        ?>
    </body>

</html>