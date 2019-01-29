<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tchat</title>
</head>
<body>

<?php$f = fopen("tchat.txt", "a+");if($_POST){

fwrite($f, $_POST['pseudo'] . " " . date('d/m/Y H:i:s') . " : ". $_POST['message'] . PHP_EOL);

}echo "<fieldset>";

$afficher_messages = file("tchat.txt");

echo implode($afficher_messages, "<br>");

echo "</fieldset>";?>


<form action="" method="post">

    <p>
        <label for="pseudo">Pseudo</label> <input type="text" name="pseudo"/><br>
        <label for="message">Message</label> <textarea type="text" name="message"></textarea><br>
        <input type="submit" value="Valider" />
    </p>
</form>
    
</body>
</html>