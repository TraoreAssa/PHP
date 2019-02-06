<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tchat en php</title>
</head>
<body>
<form action="" method="post">
      <p><label>pseudo : <input type="text" name="pseudo"></label></p>
      <p><label>texte : <textarea name="message" rows="10" cols="30"></textarea></label></p>
      <input type="submit" value="envoyer">
</form>

<?php 
// $content="";
// $identification="";
// if($_POST){

//     $tchat=fopen("message.txt","a+") or die("file not open");

//     foreach($_POST as $key => $value){
//         if(!empty($value)){
//             $content = $key . ":" . strip_tags($value) . PHP_EOL;
//             fputs($tchat, $content);
//         }else{
//             $identification = "veuillez vous identifier";
//         }
//     }
//     fclose($tchat);
    
// }

//correction : 
$f = fopen("tchat.txt", "a+");


if($_POST){
    fwrite($f, $_POST['pseudo'] . " " . date('d/m/Y H:i:s') . " : ". $_POST['message'] . PHP_EOL);
}

echo "<fieldset>";
$afficher_messages = file("tchat.txt");
echo implode($afficher_messages, "<br>");
echo "</fieldset>";
//fieldset est la zone où s'affichent les messages
//implode() est une fonction qui converti un tableau en chaine de caracteres
?>
</body>
</html>