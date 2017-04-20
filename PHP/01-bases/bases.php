<style>h2{font-size: 15px; color: red;}</style>


<?php
//-------------------------------------------
echo '<h2> Les balises PHP </h2>';
//-------------------------------------------
?>

<?php
// POur ouvrir un passage en php on utilise la balise précédente
// POur fermer un passage en php on utilise la balise suivante
?>

<strong>Bonjour</strong> <!-- en dehors des balises d'ouverture et de fermeture du php, nous pouvons écrire du HTML-->



<?php
//-------------------------------------------
echo '<h2> Ecriture et affichage </h2>';
//-------------------------------------------
echo 'Bonjour'; // echo est une instruction qui nous permet d'effectuer un affichage. Notez que les instructions se terminent par un  ";'
echo '<br>'; //  On peut mettre des balises HTML dans un echo, elles sont interprétées comme telles.

print 'Nous sommes jeudi'; //  print est une autre instruction d'affichage

// Pour info, il existe d'autres instructions d'affichage (cf plus loin dans le cours)
// print_r();
// var_dump();


//-------------------------------------------
echo '<h2> Variable : types / decalartion / affectattion </h2>';
//-------------------------------------------

// Definition : une variable est une espace mémoire nommé qui permet de conserver une valeur.
// En PHP, on déclare une variable avec le signe "$" 

$a = 127; // je déclare la variable a et je lui affecte la valeur 127
// Le type de la variable a est integer (entier)

$b = 1.5; // un type double pour nombre à virgule

$a = 'une chaîne de caractères'; // un type string pour une chaîne de caractères
$b = '127'; // il s'agit d'un string car il y a des quotes

$a = true; // type boolean qui ne prend que 2 valeurs possibles : true ou false


//-------------------------------------------
echo '<h2> Concaténation </h2>';
//-------------------------------------------
$x = 'bonjour ';
$y = 'tout le monde';
echo $x . $y . '<br>';  // point de concaténation que l'on peut traduire par 'suivi de'

echo "$x $y <br>"; // on obtient le même résultat sans concaténation (cf chapitre d'après pour l'explication de l'évaluation des variables dans les guillemets)


//-------------------------------------------
// Concaténation lors de l'affectation :
$prenom1 = 'Bruno';   // déclaration de la variable $prenom1
$prenom1 = 'Claire';    // ici la valeur "Claire" ecrase la valeur précédente "Bruno" qui était dans la variable
echo $prenom1. '<br>';  // affiche "Claire"

$prenom2 = 'Bruno';
$prenom2 .= 'Claire';
// on affecte la valeur "Claire" à la variable prenom2 en l'ajoutant à la valeur précédemment contenue dans la variable grâce à l'opérateur .=
echo $prenom2 .'<br>'; // affcihe "BrunoClaire"


//-------------------------------------------
echo '<h2> Guillemets et quotes </h2>';
//-------------------------------------------
$message = "aujourd'hui";   // ou bien :
$message = 'aujourd\'hui';
// dans les quotes on échappe les apostrophes avec l'ani-slash

$txt = 'Bonjour';
echo "$txt tout le monde <br>";    // les variables sont évaluées quand elles sont présentes dans des guillemets, c'est leur contenu qui est affiché
echo '$txt tout le monde <br>';    // dans des apostrophes on affiche littéralement le nom des variables: elles ne sont pas évaluées

//-------------------------------------------
echo '<h2> Constantes </h2>';
//-------------------------------------------
// Une constante permet de conserver une valeur qui ne peut pas (ou ne doit pas) être modifiée durant la durée du script. Très utile pour garder de manière certaine la connexion à une BDD ou le chemein du site par exemple.$_COOKIE

define("CAPITALE", "Paris");
// par convention on écrit otujours le nom des constantes en MAJUSCULES. define() permet de déclarer une constante dont on indique d'abord le nom puis la valeur
echo CAPITALE . '<br>';    // affiche Paris

// Constante s magiques :
echo __FILE__ . '<br>'; // affiche le chemin complet du fichier dans lequel on est

echo __LINE__ . '<br>';   // affiche la ligne à laquelle on est


//-------------------------------------------
echo '<h2> Opérateurs arithmétiques </h2>';
//-------------------------------------------

$a = 10;
$b = 2;

echo $a + $b . '<br>';  // affiche 12
echo $a - $b . '<br>';  // affiche 8
echo $a * $b . '<br>';  // affiche 20
echo $a / $b . '<br>';  // affiche 5
echo $a % $b . '<br>';  // affiche 0 (= le reste de la division entière)

//------------
// Opérations et affectation combinées :
$a += $b; // $a vaut 12 car équuivaut à $a = $a + $b soit 10 + 2
$a -= $b; // $a vaut 10 car équuivaut à $a = $a - $b soit 12 - 2
$a *= $b; // $a vaut 20 car équuivaut à $a = $a * $b soit 10 * 2
$a /= $b; // $a vaut 10 car équuivaut à $a = $a / $b soit 10 / 2
$a %= $b; // $a vaut 0 car équuivaut à $a = $a % $b soit 10 % 2

// -------
// Incrémenter et décrémenter :
$i = 0;
$i++;   // incrémentation de $i de +1 (vaut 1)
$i--;   // décrémentation de $i de -1 (vaut 0)

$k = ++$i;  // la variable est incrémentée de 1 puis elle est affectée à k
echo $i . '<br>';   // 1 
echo $k . '<br>';   // 1

$k = $i++;  // la variable $i est d'abord affectée à k puis incrémentée de 1
echo $i . '<br>';   // 2 
echo $k . '<br>';   // 1


//-------------------------------------------
echo '<h2> Structures conditionnelles et opérateurs de comparaison </h2>';
//-------------------------------------------
$a = 10; $b = 5; $c =2;

if($a > $b) {   // Si la condition renvoie true, on exécute les accolades qui suivent:
    echo'$a est bien supérieur à $b <br>';
}else{ // sinon (si la condition renvoie false) on exécute le else:
    echo 'Non, c\'est $b qui est supérieur à $a <br>';
}

// ----- &&
if ($a > $b && $b > $c) {   // && signifie ET
    echo 'Les deux conditions sont vraies <br>';
}
// ----- ||
if($a == 9 || $b > $c) {    // l'opérateur de comparaison est == et l'opérateur ou s'écrit ||
    echo 'Ok pour une des deux conditions <br>';
} else {
    echo 'Les deux conditions sont fausses <br>'; 
}

// -----  !=
if ($a == 8) {
    echo 'Réponse 1 <br>';
} else if ($a != 10) {  // sinon si $a différent de 10, on exécute les accolades qui suivent :
    echo 'Reponse 2 <br>';
} else {   // sinon si les donctions précédentes sont fausses, on exécute les acolades qui suivent :
    echo 'Reponse 3 <br>'; // on entre ici dans le else
}


// ----- XOR
if ($a == 10 XOR $b == 6) { 
    echo 'ok pour la condition exclusive <br>'; //Si les deux conditions sont vraies ou si les deux conditions sont fausses en même temps, nous n'entrons pas dans les accolades
}
// Pour que la condition s'exécute il faut que l'une soit vraie ou alors que l'autre soit vraie mais pas les deux en même temps.

// ------
// Conditions ternaires (forme contractée de la condition) :
echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';
// le ? remplace le if, et le : remplace le else. Si a vaut 10 on fait un echo du premier string, si non du second.

// -----
// Différence entre == et === :
$vara = 1; // integer
$varb = '1'; // string

if ($vara == $varb) {
    echo 'il y a égalité en valeur entre les deux variables <br>';
}

if ($vara === $varb) {
    echo 'il y a égalité en valeur ET en type entre les deux variables <br>';
}


// Avec la présence du triple = la comparaison ne fonctionne pas car les variables ne sont pas du même type : on compare un integer avec un string.
// Avec le double =, on ne compare que la valeur : ici la comparaison est donc juste.

/*

=       signe d'affectation
==      comparaison en valeur
===     comparaison en valeur et en type

*/

// ------
// empty et isset() :
// empty() : teste si c'est vide(c'est-à dire 0, '', NULL, false ou undefined)
// isset() : teste si c'est défini et a une valeur non NULL

$var1 = 0;
$var2 = ''; // chaîne vide sans espace

if (empty($var1)) echo 'on a 0, vide, ou non définie <br>';
if(isset($var2)) echo 'var2 existe bien <br>';

// différence entre empty et isset : si on met les lignes 208 et 209 en commentaire, empty reste vrai car $var1 n'est pas définie alors que isset est faux car $var2 n'est pas définie. empty sera utilisé pour vérifier par exemple que les champs d'un formulaire sont remplis. isset permettra par exemple de vérifier l'existence d'un indice dans un array avant de l'utiliser.'

// phpinfo();


// ------ ? et ??
// Entrer une valeur dans une variable sous condition (PHP7) :
 $var1 = isset($maVar) ? $maVar : 'valeur par défaut';  // dans cette ternaire on affecte la valeur de $maVar à $var1 si elle existe. Si celle-ci n'existe pas, on lui affecte 'valeur par défaut'
 echo $var1 . '<br>';  // affiche 'valeur par défaut'

//  En version PHP7 :
$var2 = $maVar ?? 'valeur par défaut';  // on fait exactement la même chose mais en plus court : le "??" signifie "soit l'un soit l'autre", "prend la première valeur qui existe"
echo $var2 . '<br>';

$var3 = $_GET['pays'] ?? $_GET['ville'] ?? 'pas d\'info';   // soit on prend le pays s'il existe sinon on prend la ville si elle existe, sinon on prend 'pas d'info' par défaut
echo $var3 . '<br>';












//-------------------------------------------
echo '<h2>Condition switch </h2>';
//-------------------------------------------
// Dans le switch ci-dessous les case représentent les cas différents dans lesquels on peut potentiellement tomber.
$couleur = 'jaune';

switch($couleur) {
    case 'bleu' : echo 'Vous aimez le bleu'; break;
    case 'rouge' : echo 'Vous aimez le rouge'; break;
    case 'vert' : echo 'Vous aimez le vert'; break;
    default :echo 'Vous n\'aimez rien, ni le bleu, ni le rouge, ni le vert <br>';
}

// Le switch compare la valeur de la variable entre parenthèses à chaque case ; lorsqu'une valeur correspond on exécute l'instruction en regard du case. Puis le break indique qu'il faut sortir de la condition. 
// Le default correspon à un else ; on l'exécute par défaut quand aucun case ne correspond.

// Exercice : écrivez la condition switch ci-dessus avec des if...
$couleur = 'jaune';

if($couleur == 'bleu') {
    echo 'Vous aimez le bleu';

} else if ($couleur == 'rouge') {
    echo 'Vous aimez le rouge';

} else if ($couleur == 'vert') {
    echo 'Vous aimez le vert';
    
} else {
    echo 'Vous n\'aimez rien, ni le bleu, ni le rouge, ni le vert <br>';
}


//-------------------------------------------
echo '<h2> Fonctions prédefinies </h2>';
//-------------------------------------------
// Une fonction prédefinie permet de réaliser un traitement spécifique qui est prévu dans le langage.


// -----------
echo '<h2> Traitement des chaîne de crarctères (strlen, strpos, substr) </h2>';
$email1 = 'prenom@site.fr';

echo strpos($email1, '@') . '<br>';  // strpos indique la position 6 du carctère "@" dans la chaîne $email1
echo strpos ('Bonjour', '@');
var_dump(strpos('Bonjour', '@'));
// Quand j'utilise une fonction prédefinie, il faut se demander quels sont les arguments à luui fournir pour qu'elle s'exécute correctement, et ce qu'elle peut retourner comme résultat.
// Dans l'exemple de strpos() : succès => integer, échec => boolean (false).

// -----------
$phrase = 'Mettez une phrase à cet endroit';
echo '<br>' . strlen($phrase) . '<br>';  // affiche la longueur du string : succès => integer, échec => false

// -----------
$texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum veritatis cupiditate minus, iusto vel explicabo facilis quia autem consequatur. Placeat, nisi explicabo sapiente veniam quas ratione quidem voluptates reiciendis error?';
echo substr($texte, 0, 20) . '...<a href=""> Lire la suite </a><br>'; // on découpe une partie du texte et on lui concatène un lien. Succès => string, échec => false.

// -----------
echo str_replace('site', 'gmail', $email1); //  remplace 'site' par 'gmail' dans le string contenu dans $email1

// -----------
$message ='        Hello world        ';
echo strtolower($message) . '<br>';   // passe le string en minuscules
echo strtoupper($message) . '<br>';   // passe le string en majuscules

echo strlen($message) . '<br>';
echo strlen(trim($message)) . '<br>'; // trim permet de supprimer les espaces au début et à la fin d'un string'


//-------------------------------------------
echo '<h2> Le manuel PHP en ligne </h2>';
//-------------------------------------------
// Le manuel PHP en ligne :
// http://php.net/manuel/fr/


//-------------------------------------------
echo '<h2> Gestion des dates </h2>';
//-------------------------------------------
echo date('d/m/Y H:i:s') . '<br>'; // affiche la date et l'heure de l'instant selon le format indiqué : d = day, m=  month, Y = year sur 4 chiffres, y = year sur 2 chiffres, H = Heures sur 24h, i = minutes, s = secondes. On peut choisir les séparateurs

echo time() .'<br>'; // retourne le timestamp actuel = nombre de secondes écoulées depuis le 01/01/1970 à 00:00:00 (création théorique de UNIX).

// La fonction prédéfinie strtotime() :
$dateJour = strtotime('10-01-2016'); // retourne le strtotime de la date indiquée
echo $dateJour . '<br>';

// La fonction strftie() :
$dateFormat = strftime ('%Y-%m-%d', $dateJour); // transform le timestamp donné en date selon le format indiqué, ici YYYY-MM-DD
echo $dateFormat . '<br>'; //affiche 2016-01-10

// Exemple de conversion de format de date :
// Trabsformer 23/05/2015 en 2015/05/23 :
echo strftime('%Y-%m-%d', strtotime('23-05-2015'));

echo '<br>';
// Transformer 2015-05-23 en 23-05-2015 :
echo strftime('%d-%m-%Y', strtotime('2015-05-23'));

echo '<br>';
// Cette méthode de transformation est limitée dans le temps (2038)... On peut donc utiliser une autre méthode avec la classe DateTime :
$date = new DateTime('11-04-2017');
echo $date->format('Y-m-d');
// DateTime est une classe que l'on peut comparer à un plan ou un modèle qui sert à construire des objets "date".
// On construit un objet date avec le mot new en indiquant la date qui nous intérese entre parenthèse. $date est donc un objet "date".
// Cet objet bénéficie de méthodes (=fonctions) offertes par la classe  : il y a entre autres, la méthode format() qui permet de modifier le format d'une date. Pour appeler cette méthode sur l'objet $date, on utilise la flèche, "->".


?>
