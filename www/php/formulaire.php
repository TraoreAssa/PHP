<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Formulaires</title>
</head>
<body>
    <form method = "POST" action = "target.php"> 
    <!-- POST variable pour php  -->
        <p>
            <label for="prenom">Entrez votre prénom : </label>
            <input type="text" name = "prenom" id = "prenom">
        </p>
        <p>
            <label for="prenoms">Entrez votre prénom : </label>
            <input type="text" name = "prenoms" id = "prenoms">
        </p>
        <p>
            <label for="nom">Entrez votre nom : </label>
            <input type="text" name = "nom" id = "nom">
        </p>
        <p>
            <label for="pseudo">Entrez votre pseudo : </label>
            <input type="text" name = "pseudo" id = "pseudo">
        </p>
        <p>
            <input type="submit" value = "Envoyer">
        </p>
    </form>
    <?php













    ?>
</body>
</html>