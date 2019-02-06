<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon site</title>
    <link rel="stylesheet" type="text/css" href="<?php echo RACINE_SITE; ?>inc/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <header>
      <div class="container-fluid">
        <?php require_once("navigation.inc.php"); ?>
      </div>
    </header>
    <section>
      <div class="container">

    

<!--attention les balises html, body et section ne sont pas fermees dans ce fichier mais dans le fichier bas.inc.php, auquel il est relie par require_once('inc/bas.inc.php') dans la page index.php-->
