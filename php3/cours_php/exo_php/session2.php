<?php 
session_start();

echo "bonjour " . $_SESSION['pseudo'];
//avec la creation du cookie, le pseudo créé dans session.php apparait ici egalement sans que les fichiers soient lies pour autant