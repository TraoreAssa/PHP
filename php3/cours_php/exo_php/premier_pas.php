<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Premiers pas</title>
</head>
<body>
    <h1>Un titre</h1>
    <?php echo "test" ; ?>
<style>
h2{
    margin: 0;
    padding: 10px;
    font-size: 25px;
    color: red;
    background: #000;
}
</style>
<h2>Affichage et Ecriture</h2>
<?php
echo "<br>";
echo "Bonjour";
echo "<hr>";
echo "<h2>Les commentaires</h2>";
// commentaire sur une ligne
/* commentaire
sur
plusieurs
lignes */
# commentaire sur une ligne
print "<br>";
print "Nous sommes mercredi";
?>
<strong> 2 Janvier 2019 </strong>
<?= "<br><br> texte <br><br>" ?> <!-- remplace echo -->
<?php
echo "<h2> Variables : type / déclaration / affectation </h2> <br>";
$a = 1247;
echo "$a : ";
echo gettype($a);
echo "<br><br>";
$b = 1.5;
echo "$b : ";
echo gettype($b);
echo "<br><br>";
$c = "une chaine";
echo "$c : ";
echo gettype($c);
echo "<br><br>";
$d = true;
echo "$d : ";
echo gettype($d);
echo "<br><br>";
echo "<h2> La concaténation </h2> <br>";
$x = "bonjour ";
$y = "tout le monde";
echo $x . $y . "<br>";
echo "$x $y <br>";
echo "bonjour", " tout le monde";
echo "<br><br>";
echo "<h2>La concaténation lors de l'affectation </h2> <br>";
$prenom = "Marie";
$prenom .= "-Curie";// ne pas oublier le . avant le ="
echo $prenom;
echo "<br><br>";
//ne pas oublier d'ouvrir mes balises php
    
    echo "<h2>Guillemets et quotes</h2>";
    $message = "aujourd'hui";
    $message = 'aujourd\'hui';
    $prenom2 = "Pierre";
    $prenom3 = "Jacques";
    echo "Bonjour $prenom3 et $prenom2 <br>";
    echo 'Bonjour $prenom3 et $prenom2';// il faut veiller a conserver les mêmes ponctuations pour afficher le texte : $prenom3 est insere entre guillemets, si je mets '' a mon echo il ne prendra pas la valeur en compte et affichera $prenom3 et non Jacques
    echo "<h2>Constante et constante magique</h2>";
    define("CAPITALE", "Paris");//je definis ma constante avec define et en majuscules
    echo CAPITALE . "<br>";
    echo __FILE__ ."<br>";//affiche en constante le chemin du fichier, j'utilise 2 underscores avant et 2 apres
    echo __LINE__ ."<br>";//affiche la ligne de l'editeur de texte, ici 81. Comme pour le chemin du fichier, c'est double underscore avant et après 
    echo "<h2>Operateurs arithmétiques</h2>";
    $a = 1; $b = 2;
    $r = $a + $b;
    echo $r;
    //operateurs  :  +, -, /, *-->
    echo "<h2>Structures conditionnelles - operateurs de comparaisons</h2>";
    //Isset et Empty : 
    //empty = tester si une variable est vide 
    //isset = tester si une variable est definie //meme si elle est definie par rien, elle est quand meme definie
    $var = "";
    if(isset($var)) {echo "var existe et est definie par rien <br>";};
    //ici, la condition verifie si var est definie et, si elle est definie, affiche le texte

    $var2 = 0;
    if(empty($var2)) {echo "0, vide ou non definie";};

    /*
    < superieur
    > inférieur
    <= sup ou égal
    >=inf ou égal
    != different de 
    !== different type et valeur
    == égal à
    === égalité type et valeur
    || OU 
    && ET
    */


    // exercice  : définir 2 variables a et b
// a vaut 10 et vaut '10' et vérifier avec une condition si ils ont la même valeur

$a = 10;
$b = '10';

if($a === $b){
    echo "$a et $b ont la même valeur";
}else{
    echo "$a et $b n'ont pas la même valeur <br>";
};
if($a == $b){
    echo"true";
}else{
    echo"false";
}

// afficher Bleu-Blanc-Rouge (avec les tirets) en mettant le texte de chaque couleur dans des variables
$couleur="Bleu";
$couleur2 ="Blanc";
$couleur3="Rouge";
echo "$couleur- $couleur2- $couleur3<br>";

echo "<h2>Fonctions predefinies</h2>";
$email = "prenom@email.com";
echo strpos($email, "@"); //ici, renvoie la position du @ dans l'adresse
//exercice : creer une variable email avec une adresse mail et verifier si c'est une adresse valide ou pas
if(strpos($email, "@")){
    echo "cette adresse est valide<br>";
}else{
    echo "verifier votre adresse";
}// pour être valide, il doit y avoir @. cette fonction est utile pour la securité du site, par exemple

//autre exemple:
$email2="email";
var_dump(strpos($email, "@"));
echo "<br>";
var_dump(strpos($email2, "@"));
//var_dump est une fonction qui permet d'afficher plus de precisions
echo "<br>";
$phrase = "il était une fois la belle et la bête";
echo  "<br>" . iconv_strlen($phrase);//renvoie la taille d'une chaîne de caractères(nb de caracteres faisant partie de la chaîne d'octets. Srlen recupere uniquement la taille, pas les octets)
echo substr($phrase, 0, 19) . "..." . "<a href:>lire la suite</a>";//cette fonction retourne une partie de la chaine de caracteres, ici uniquement les 19 premiers, soit il etait une fois, assorti de ...   . C'est par exemple le procédé utilisé dans les articles où on nous invite a decouvrir la suite de l'article en cliquant sur un lien

echo "<h2>Fonctions Utilisateurs</h2>";
//ces fonctions sont créées par l'utilisateur en fonction de ses besoins
function ecrir($arg){
    echo $arg."<br>";
}

ecrir($phrase);
//dans cet exemple j'ai créé une fonction qui permet d'afficher une phrase ou un texte redigé dans une variable. Ici, j'ai affiché le texte contenu dans ma variable $phrase du dessus

//exercice: creer une fonction meteo qui permet d'afficher la saison et la temperature : "nous sommes en automne et il fait 1 degre". Il faut gerer les cas si degre est au pluriel ou au singulier

// $saison="automne";
// $temperature=-9;

// function meteo($saison, $temperature){
//     if($temperature ==1 || $temperature ==0){
//     echo "Nous sommes en " . $saison . " et la temperature est de " . $temperature . " degré";
// }elseif($temperature >=2){
//    echo "Nous sommes en " . $saison . " et la temperature est de" . $temperature . " degrés";
// }else{
//     echo "il fait trop froid";
// }
// }
// meteo($saison, $temperature);

//correction: 
function meteo($temp, $saison){
    echo "Nous sommes en $saison et il fait $temp ";
    if($temp >1 || $temp < -1){
        echo "degres";
    } else {
        echo "degré";
    }
}
meteo(-1, "hiver");
echo "<br>";
//exercice : fonction appliquer TVA 19.6. Creer une fonction qui applique une tva à 19.6% sur un prix

function appliquer($prix, $tva){
    $prix += $prix * $tva/100;
    echo "le prix TTC est de $prix";
}
appliquer(325, 19.6);
echo "<br>";

function bonjour(){
    echo "allo <br>";
    return "bonjour moi!";
}
var_dump(bonjour());
//return : sort de la fonction juste après l'utilisation du return, c-a-d que si un echo est placé juste apres un return, il ne sera pas affiché.Le return renvoie une information. Dans notre exemple ci-dessus, le var_dump nous indique que le return est un string qui contient 12 caractères qui sont "bonjour moi!"

//creer une fonction qui verifie l'age des utilisateurs

function identite(int $age){//le int ici indique que l'on s'attend a avoir un nb entier, un integer
    if ($age >=18){
        echo "true";
    } else {
        echo "false";
    }
}

echo "<h2>Boucles</h2>";
// for($i = 0; $i < 10; $i++){
//     ecrir($i);
// }

// echo "<select>";
//  echo "<option>1</option>";
//  echo "<option>2</option>";
//  echo "<option>3</option>";
// echo "</select>";

 echo "<select>";
for($i = 0; $i<=10; $i++){
    echo "<option>$i</option>";  
}
echo "</select>";
echo "<h2>Inclusion de fichiers</h2>";//cela signifie inclure du contenu de fichier
echo "<p>cf main, header, navigation etc</p>";

echo "<h2>Les tableaux de données ARRAY</h2>";

$liste = array("Nic","Mick", "Will", "Elo");
$liste[]="jean";//avec cette formulation, je peux ajouter des elements dans mon tableau quelque soit l'endroit de mon code où je me trouve
echo "<pre>";
print_r($liste);
echo "</pre>";

ecrir("var_dump(expression)");
echo "<pre>";
var_dump($liste);
echo "</pre>";

$tab[]="";
$tab[]="Canada";
$tab[]="Grece";
$tab[]="Irlande";
echo "<pre>";
var_dump($tab);
echo "</pre>";

ecrir("sizeof(var)");
for($i = 0; $i < sizeof($liste); $i++){
    ecrir($liste[$i]);
}//sizeof permet de renvoyer la taille du tableau

ecrir("count(var)");
for($i = 0; $i < count($liste); $i++){
    ecrir($liste[$i]);
}//meme resultat que sizeof

//exercice: afficher la liste avec une boucle while et une boucle do...while
$i = 0;//indice de depart
while($i<sizeof($liste)){//condition
    echo $i++;//incrementation
}

$i=0;//indice de depart
do{//do while : condition
    ecrir($liste[$i]) ;
    $i++;//incrementation
}while ($i < count($liste));

//exercice: creer une liste de 10 fruits, afficher cette liste avec une boucle for, do, do...while dans une liste en html
$fruit = array("Banane","Pomme", "Ananas", "Mangue", "Abricot", "Pomme", "Banane", "Fraise", "Orange", "Raisin");
//for
for($i = 0; $i<count($fruit); $i++){
    ecrir($fruit[$i]);
}

//while
$i=0;
while($i<sizeof($fruit)){
    echo($i++);
}

//do...while
$i=0;
do{
    ecrir($fruit[$i]);
    $i++;
}while ($i< count($fruit));



echo "<ul>";
for($i = 0; $i<count($fruit); $i++){
    echo "<li>$fruit[$i]</li>";
}
echo "</ul>";


$i=0;
 echo "<ul>";
while($i<count($fruit)){
    echo "<li>$fruit[$i]</li>";
    echo ($i++);
}
echo "</ul>";


$i=0;
echo "<ul>";
do{
    echo "<li>$fruit[$i]</li>";
    $i++;
}while ($i< count($fruit));
echo "</ul>";


//correction
ecrir("boucle do while");
$i=0;
echo("<ul>");
do{
    ecrir("<li>$fruit[$i]</li>");
    $i++;
}while($i < count($fruit));
echo("</ul>");

echo "<h2>La boucle foreach</h2>";

//la boucle foreach sert a parcourir un tableau
//condition (liste_a_parcourir as $key => $value)
//$key et $value sont l'indice de la valeur ET la valeur du tableau ex: si pomme est le premier indice du tableau, alors sa key est 0 et sa valeur est pomme
//key recupere egalement le name des input
//syntaxe:
// foreach ($variable as $key => $value){
//     # code...
// }

foreach ($fruit as $key => $value){
    ecrir("$key - $value");
}

foreach ($liste as $x => $y){
    ecrir("$x - $y");
}

echo"<h2>Tableaux multidimensionnels</h2>";
//avoir plusieurs tableaux dans un tableau

$tabMulti = array(0 => array(), 1=>array());//ici j'ai un tableau global qui contient deux tableaux

$tabMulti = array(0 => array("prenom"=>"Julien","nom"=>"Dupont"), 1=>array("prenom"=>"Yassine","nom"=>"Jaagoub"));//ici, tableau associatif, c-a-d que mes indices(mes keys) ne sont pas des nombres mais de noms("prenom", "nom")

ecrir("<pre>");
print_r($tabMulti);
ecrir("</pre>");

//exercice: afficher les prenoms du tableau avec une boucle for
// for($i = 0; $i<count($fruit); $i++){
//     ecrir($fruit[$i]);
// }
for($i=0; $i<count($tabMulti); $i++){
    ecrir($tabMulti[$i]["prenom"]);//je ne recupere que les prenoms
}

foreach ($tabMulti as $key => $value){//le value ici correspond aux tableaux dans le tableau global
    foreach ($value as $key2 => $value2){//value2 correspond aux valeurs qui sont dans chaque tableau
   ecrir( "$key2 => $value2");
    }
}

echo "<h2>Les objets</h2>";
//on peut retrouver dans les objets des fonctions que l'on appelle methodes
class Etudiant{
    public $prenom = "Julien";//le mot-cle public permet de dire que l'attribut ou la propriete est accessible partout dans mon fichier php mais aussi dans d'autres fichiers php si j'appelle l'objet en question dans ces fichiers.On trouve aussi private et protected: avec private je n'y ai acces que dans le fichier en cours, avec protected je dois definir une fonction pour pouvoir y avoir acces partout. C'est l'encapsulation
    public $age = 25;

    public function resident(){
        return "France";
    }
}
//pour creer un objet, je cree ma var et je lui attribue le mot-cle new
$objet = new Etudiant();

echo $objet->prenom . "<br>";//dans cet exemple, j'ai accès au prenom de l'objet 'etudiant' grace a ->
echo $objet->age."<br>";
echo $objet->resident()."<br>";

//modifier le prenom de l'objet et l'afficher

//attribut=variable
$objet->prenom="Alienor";
echo $objet->prenom . "<br>";//ici j'ai accedé a mon objet etudiant et j'ai modifié le prenom de base

//fonction de recuperation des données private et protected
//ex:
class Voiture{
    private $modele = "c220";

    public function getModele(){
        return $this->modele;
    }//avec get... je recupere mon element. C'est l'accesseur

    public function setModele($modele){
        $this->modele=$modele;//avec set... je peux modifier mon modele.C'est le mutateur
    }
}

$megane = new Voiture();

//$megane->getModele;
echo $megane->getModele()."<br>";
$megane->setModele("megane 4");
echo $megane->getModele()."<br>";

//exercice :creer un objet animal, ensuite declarer les attributs race, couleur, categorie ainsi que les methodes manger, boire, voler, courir.Ensuite créer un dauphin, un lion, un aigle

class Animal{
    public $race = "chauve-souris";
    public $couleur = "blanche";
    public $categorie = "mammifere";

    

    public function manger(){
        echo "frugivore";
    }
    public function boire(){
        echo "eau";
    }
    public function voler(){
        echo "vol autorisé";
    }
    public function courir(){
        echo "je ne cours pas je vole";
    }
}

$objet = new Animal();
echo $objet->race . "<br>";//dans cet exemple, j'ai accès au prenom de l'objet 'animal' grace a ->
echo $objet->couleur."<br>";
echo $objet->categorie."<br>";
echo $objet->manger()."<br>";
echo $objet->boire()."<br>";
echo $objet->voler()."<br>";
echo $objet->courir()."<br>";

// $dauphin = new Animal("dauphin","gris","mammifere");
// echo $objet->race="dauphin" ."<br>";
// echo $objet->couleur="gris". "<br>";
// echo $objet->categorie="mammifere" . "<br>";







?>
</body>
</html>