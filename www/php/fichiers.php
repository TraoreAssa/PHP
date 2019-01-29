<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Les Fichiers</title>
</head>
<body>
    <?php
    $definition = fopen('def_php.txt','r+');//ouvrir un ficher
    $affichagedef = fread($definition, 1000);//lire un fichier
    echo $affichagedef;
    
    // fgets lire ligne par ligne
    /* 
    r = ouvrir un fichier en lecture seul sans pouvoir le modif
    r+ = ouvrir un fichier pouvant le modifer 
    Curseur : Pointer au debut du fichier

    a = ouvrir un fichier en lecture seul ou s'il existe pas crée un nouveau
    a+ = ouvrir un fichier en lecture seul et ecriture ou s'il existe pas  crée un nouveau
    Curseur : Pointer a la fin du fichier
    

    w = ouvrir un fichier en lecture seul en supprimant le contenu préexistant ou s'il existe pas crée un nouveau
    w+ = ouvrir un fichier en lecture seul et en ecriture en supprimant le contenu préexistant ou un crée un nouveau
    Curseur : Pointer au debut du fichier    

    x = crée un nouveau fichier en ecriture seul retourne FALSE si il existe deja
    x+ =  crée un nouveau fichier en lecture et en ecriture retourne FALSE si il existe deja
    */
    $definition = fopen('def_php.txt','r+');//ouvrir un ficher
    while(!feof($definition)){
    echo fgets($definition); //Curseur : Pointer a la fin de la ligne lue
    }
    fclose($definition);//fermer un fichier


    //fgetc() affiche caractere par caractere 
    //Curseur : Pointe au niveau du caractère suivant






    ?>
</body>
</html>