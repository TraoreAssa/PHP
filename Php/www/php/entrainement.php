<style>
h2{
    margin: 0;
    padding: 10px;
    font-size: 25px;
    color: lightcoral;
    background: lightgreen;
    text-align: center;
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
$prenom .= "-Curie";
echo $prenom;

echo "<br><br>";

echo "<h2>Guillemets et Quotes</h2> <br>";
$message = "aujourd'hui";
$message = 'aujourd\'hui';
$prenom2 = "Pierre";
$prenom3 = "Jacques";
echo "Bonjour $prenom3 et $prenom2 <br>";
echo 'Bonjour $prenom3 et $prenom2';

echo "<br><br>";

echo "<h2>Constante et Constante magique </h2> <br>";
define ("CAPITALE", "Paris");
echo CAPITALE . "<br>";
echo __FILE__ . "<br>";
echo __LINE__;

echo "<br><br>";

echo "<h2>Opérateurs arithmétiques</h2> <br>";

$a = 1; $b = 2;
$r = $a + $b;
echo $r;
// + * / -

echo "<br><br>";

echo "<h2>Structure conditionnelles - opérateurs de comparaison</h2> <br>";

// Isset et Empty
// Empty = tester si une variable est vide
// Isset = tester si une variable est définie

$var = "";
if(isset($var)) {echo "var existe et est définie par rien <br>";};
$var2 = 0;
if(empty($var2)) echo "0, vide ou non défini";

/*
   < superieur
   > inferieur
   <= superieur ou egal
   >= inferieur ou egal
   != different de
   !== different type et valeur
   == egalite
   === egalite type et valeur
   || ou
   && et
*/

//exercice : définir 2 variables a et b. a vaut 10 et b vaut '10' et verifier avec une condition si ils ont la meme valeur.
$a = 10; $b = '10';
echo "<br>";
if ($a == $b) {
    echo "true";
} else {
    echo "false";
}

echo "<br>";

//exercice : afficher Bleu-Blanc-Rouge (avec les tirets) en mettant le texte de chaque couleur dans des variables.
$couleur = "Bleu";
$couleur2 = "Blanc";
$couleur3 = "Rouge";
echo '<span style="color: blue;">' . $couleur . "-</span>" . '<span style="color: black;">' . $couleur2 . "-</span>" . '<span style="color: red;">' . $couleur3 . "</span>";

echo "<br><br>";

echo "<h2>Fonctions prédéfinies</h2><br>";
$email = "prenom@email.com";
echo strpos($email, "@");

echo "<br>";

//exercice : creer une variable email avec une adresse email et verifier si c'est une addresse email valide ou pas.
if (strpos($email, "@")) {
    echo "Valide";
} else {
    echo "Non valide";
}

$email2 = "email";
var_dump(strpos($email, "@"));
echo "<br>";
var_dump(strpos($email2, "@"));

echo "<br>";

$phrase = "Il était une fois la Belle et la Bête <br>";
echo $phrase;
echo iconv_strlen($phrase) . "<br>"; //taille de la chaine de caractère
echo substr($phrase, 0, 19) . "..." . "<a href='#'> Lire la suite </a>";

echo "<br><br>";

echo "<h2>Fonctions utilisateurs</h2> <br>";

function ecrir($arg){
    echo $arg . "<br>";
}
ecrir($phrase);

//exercice : creer une fonction meteo qui permet d'afficher la saison et la température. "Nous sommes en automne et il fait 1 degré". ATTENTION gérer le cas si degré est au pluriel ou au singulier.

function meteo($saison, $temp) {

    $message = "Nous sommes en " . $saison . " et il fait " . $temp . " degré";    
    if($temp > 1 || $temp < -1) {
        $message .= "s";
    }    
    echo $message;
 }
meteo("automne", 0);

echo "<br>";

//exercice : fonction appliquerTVA 19.6.

function appliquerTVA($prixHT, $TVA) {
    $prixTTC = $prixHT + ($prixHT * $TVA / 100);
    echo "Le prix TTC est de ";
    return $prixTTC . "€";
}
echo appliquerTVA(100,19.6);

echo "<br>";

//exercice :  creer une fonction qui verifie l'age de l'utilisateur.

function age($age){
    if($age >= 1 && $age <= 17){
        echo "Mineur";
    } else if($age >= 18){
        echo "Majeur";
    } else {
        echo "Erreur";
    }
}
age(20); 


echo "<br><br>";

echo "<h2>Boucles</h2><br>"; 

for($i = 0; $i < 10; $i++) {
    ecrir($i);
}

echo "<br><select>";
     echo "<option> 1 </option>";
     echo "<option> 2 </option>";
     echo "<option> 3 </option>";
echo "</select>";

echo "<br>";

echo "<select>";
for($i = 0; $i < 10; $i++) {
    ecrir("<option>" . $i . "</option>");
}
echo "</select>";


echo "<br><br>";

echo "<h2>Inclusions de fichiers</h2><br>"; 
echo "<p> cf main, header, navigation, etc...</p>";


echo "<br><br>";

echo "<h2>Les tableaux de données ARRAY</h2><br>"; 

$liste = array("gregorie", "natalie", "pierre", "jacques");
$liste[] = "rachid";
ecrir("print_r(expression)");

echo "<br>";

print_r($liste);

echo "<pre>";
print_r($liste);
echo "</pre>";

ecrir("var_dump(expression)");

echo "<pre>";
var_dump($liste);
echo "</pre>";

$tab[] = "France";
$tab[] = "Maroc";
$tab[] = "Espagne";
echo "<pre>";
var_dump($tab);
echo "</pre>";

ecrir("SIZEOF(var)");
for($i = 0; $i < sizeof($liste) ; $i++){
    ecrir ($liste[$i]);
}

echo "<br>";

ecrir("COUNT(var)");
for($i = 0; $i < count($liste) ; $i++){
    ecrir ($liste[$i]);
}

echo "<br>";

//exercice : afficher la liste avec une boucle while et une boucle do while.

ecrir("WHILE");
$i = 0;
while ($i < count($liste)) {
    ecrir ($liste[$i]);
    $i++;
}

echo "<br>";

ecrir("DO WHILE");
$i = 0;
do {
    ecrir($liste[$i]);
    $i++;
} while ($i < count($liste));

echo "<br><br>";

//exercice : creer une liste de 10 fruits, afficher la liste avec une boucle for, while et do while dans une liste en html (ul, li);

$panier = array("pomme", "poire", "fraise", "framboise", "abricot", "banane", "peche", "mangue", "ananas", "orange");

ecrir("<ul>");
for($i = 0; $i < count($panier) ; $i++){
    echo ("<li>" . $panier[$i] . "</li>");
}
ecrir("</ul>");


$i = 0;
ecrir("<ul>");
while ($i < count($panier)) {
    echo ("<li>" . $panier[$i] . "</li>");
    $i++;
}
ecrir("</ul>");


$i = 0;
ecrir("<ul>");
do {
    echo("<li>" . $panier[$i] . "</li>");
    $i++;
} while ($i < count($panier));
ecrir("</ul>");


ecrir("<h2>La boucle foreach</h2>");

foreach($panier as $key => $value) {
    ecrir("$key - $value");
}
echo "<br>";
foreach($liste as $x => $y) {
    ecrir("$x - $y");
}
echo "<br>";


ecrir("<h2>Les tableaux multidimentionnels</h2>");

$tabMulti = array(0 => array("prenom" => "Julie", "nom" => "Mcx"), 1 => array("prenom" => "Sonia", "nom" => "Boubou"));

ecrir("<pre>");
print_r($tabMulti);
ecrir("</pre>");

//exercice : afficher les prenoms ce tableau avec une boucle for et foreach

for($i = 0; $i < count($tabMulti) ; $i++){
    ecrir ($tabMulti[$i]["prenom"]);
}
echo "<br>";
foreach($tabMulti as $key => $value) {
    foreach ($value as $x => $y) {
        ecrir("$x => $y");
    }
}
echo "<br>";


ecrir("<h2>Les objets</h2>");

class Etudiant
{
    // private et protected
    public $prenom = "Julien";
    public $age = 25;

    public function resident(){
        return "France";
    }
}

$objet = new Etudiant();

ecrir ($objet->prenom);
ecrir ($objet->age);
ecrir ($objet->resident());

//exercice : modifier le prenom de l'objet et l'afficher.

$objet->prenom = "*Julie*";
ecrir ($objet->prenom);

echo "<br>";

//exercice : creer un objet animal, ensuite déclarer les attributs race, couleur, catégorie, ainsi que ls méthodes manger, boire, voler, courir, nager.
//ensuite creer un dauphin, un lion, un aigle.

class Animal
{
    public $race;
    public $couleur;
    public $categorie;

    function __construct($race, $couleur, $categorie)
    {
        $this->race = $race;
        $this->couleur = $couleur;
        $this->categorie = $categorie;
    }

    public function boire() {
        echo "glouglou";
    }
    public function voler() {
        echo "I believe I can fly ~ !";
    }
    public function courir() {
        echo "Cours Forest ! Couurs !";
    }
    public function nager() {
        echo "Comme un poisson dans l'eau";
    }
}

$dauphin = new Animal("dauphin", "bleu", "mammifere");
echo $dauphin->race . "<br>";

$lion = new Animal("lion", "jaune", "felin");
echo $lion->categorie . "<br>";

$aigle = new Animal("aigle", "noir", "volatil");
echo $aigle->couleur . "<br>";


?>