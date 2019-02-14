<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
</head>
<body>
  


    <div class="container">
        <h1>Test</h1>
        <div class="test">
        <form method="post" action="testpage.php" enctype="">
    
            <label for="nom">Nom</label>
            <input type="text"id="nom"name="nom"required>
            <br>
            <!--ID fait le lien avec le FOR du label en HTML le NAME est récupéré en php. ce type d' ID étant dans un formulaire il n'y a pas le soucis de limiter l'utilisation de l'attribut ID-->
        
            <label for="email">email*</label>
            <!--*pour champ obligatoire REQUIRED dans l'input-->
            <input type="email" id="email"name="email"placeholder="email"required>
            <br>
            <!--PLACHOLDER est le texte explicatif en grisé dans le champs non encore rempli-->
        
            <label for="file">fichier</label>
            <input type="file"id="file" name="file">
            <br>
            <!--type FILE crée un bouton"parcourir"pour aller chercher un fichier-->
        
            <label for="civilite">civilite</label>
            <p>
                <!--cases à cocher rondes, CHECKED en code une par défaut et une seule peût-être choisie-->
                <input type="radio" name="civilite" value="m"checked>homme
                <input type="radio" name="civilite" value="f">femme
            </p>
        
            <label for="ville">ville</label>
            <input type="text" id="ville" name="ville">
            <br>
        
            <label for="cp">code postal</label>
            <input type="text" id="id" name="id" name="" maxlength="5"pattern="[0-9]{5" maxlength="5"pattern="[0-9]{5">
            <br>
            <!--MAXLENGHT impose un max de caractères et PATTERN permet d'imposer le type de caractères numériques et comme PATTERN permet de préciser le nombre de caractères max, on peut enlever MAXLENGHT ici( on le garde pour les connaissances)-->
            <label for="adresse">adresse</label>
            <textarea id="adresse" name="adresse" rows="15" cols="25"></textarea>
            <br>
        
            <!-- <input type="submit" name="inscription" value="s'inscrire"> -->
            <a href="testpage.php">Valider</a>
            <!-- <input type="reset" name="efface" value="Recommencer"> -->
            <br>
        
        </form>
        
        
        
        </div>
    
    
    
    
    </div>

</body>
</html>