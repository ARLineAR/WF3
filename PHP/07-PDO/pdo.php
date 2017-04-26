<?php
//************************************************
// Introduction aux objets
//************************************************
// L'extension PHP Data Objects' (PDO) définit une interface pour accéder à une base de données depuis PHP.



// ----------------------------
echo '<h1>01. Connexion</h1>';
// ----------------------------


$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// $pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la BDD.

/* Les arguments passés à PDO : 
        - driver + server + nom de la base de données 
        - pseudo du SGBD
        - mdp du SGBD
        options : option 1 pour générer l'affichage des erreurs, option 2 = commande à exécuter lors de la connexion au serveur qui définit le jeu de caractères des échanges avec la BDD'
*/

print_r($pdo);
echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>'; // permet d'afficher les méthodes disponibles dans l'objet $pdo



// ----------------------------
echo '<h1>02. exec() avec INSERT, UPDATE et DELETE </h1>';
// ----------------------------

// $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");


/*
    exec() est utilisé pour formuler des requêtes ne retournant pas de jeu de résultats : INSERT, UPDATE, et DELETE

    valeur de retour:
        Succès : un integer correspondant au nombre de lignes affectées
        Echec : false
*/

// echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
echo 'Dernier id généré : ' . $pdo->lastInsertId();

// -------
$resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
echo "Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";

// ----------------------------
echo '<h1>03. query() avec SELECT + Fetch </h1>';
// ----------------------------

    $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");    // Avec query: $result est un objet issu de la class prédéfinie PDOstatement.
    // Au contraire d'exec(), query() est utilisé pour la formulation de requete retournant un ou plusieurs résultat: SELECT.

    // Valeur de retour:
        // - Succes: objet PDOstatement
        // - Echec: false
    // Notez qu'avec query(), on peut aussi utiliser INSERT, DELETE et UPDATE.

    echo '<pre>'; print_r($result); echo '<pre>';
    echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>';   // On voit les nouvelles methodes de la class PDOstatement.

    // $result constitue le résultat de la requete sous forme inexploitable directement: il faut donc le transformé par la methode fetch():
        $employe = $result->fetch(PDO::FETCH_ASSOC);   // La methode fetch() avec le parametre PDO::FETCH_ASSOC permet de transformer l'objet $result en un array associatif exploitable indexé avec le nom des champs de la requete.
        echo '<pre>'; print_r($employe); echo '<pre>';
        echo "Bonjour, je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";

    // Ou encore faire un fetch() selon l'un des methodes suivantes:
            $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
            $employe = $result->fetch(PDO::FETCH_NUM);  // Pour obtenir un array indexé numeriquement.
            echo '<pre>'; print_r($employe); echo '<pre>';
            echo $employe[1];   // On accede au prenom par l'indice 1 de l'array $employe.

        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch();
        echo '<pre>'; print_r($employe); echo '<pre>';

        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch(PDO::FETCH_OBJ);  // Retourne un nouvel objet avec les noms de champs comme propriété (=attribut) public.
        echo '<pre>'; print_r($employe); echo '<pre>';
        echo $employe->prenom;  // Affiche la valeur de la propriété prenom de l'objet employé.

    // Attention: Il faut choisir l'un des fetch que vous voulez executez sur un jeu de resultat. Vous ne pouvez pas faire plusieurs fetch sur le même résultat n'en contenant qu'une seule. En effet, cette methode déplace un curseur de lecture sur le resultat suivant contenu dans le jeu de resultat: ainsi, quand il n'y en a qu'un seul, on sort du jeu.

// ----------------------------
echo '<h1>Exercice </h1>';
// ----------------------------
    // Afficher le service de l'employé Laura selon 2 methodes de votre choix:

            $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'Laura'");
            $employe = $result->fetch(PDO::FETCH_NUM);
            echo '<pre>'; print_r($employe); echo '<pre>';
            echo $employe[4];

            echo '<br>';

            $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'Laura'");
            $employe = $result->fetch(PDO::FETCH_ASSOC);
            echo "Bonjour, je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";

            echo '<br>';

            $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
            $employe = $result->fetch(PDO::FETCH_NUM);
            echo '<pre>'; print_r($employe); echo '<pre>';
            echo $employe[0];

            $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
            $employe = $result->fetch(PDO::FETCH_ASSOC);
            echo '<pre>'; print_r($employe); echo '<pre>';
            echo $employe['service'];

            $result = $pdo->query("SELECT service FROM employes WHERE prenom = 'Laura'");
            $employe = $result->fetch(PDO::FETCH_OBJ);
            echo '<pre>'; print_r($employe); echo '<pre>';
            echo $employe->service;

// ----------------------------
echo '<h1>04. while et fetch_assoc </h1>';
// ----------------------------

$resultat = $pdo->query("SELECT * FROM employes");

echo "Nombre d'employés : " . $resultat->rowCount() . '<br>'; // permet de compter le nombre de lignes retournées par la requête

while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC)) {     // fetch retourne la ligne suivante du jeu de résultats en array associatif. La boucle while permet de faire avancer le curseur dans le jeu de résultats, et s'arrête quand il est à la fin des résultats

    // echo '<pre>'; print_r($contenu); echo '</pre>';      // on voit que $contenu est un array associatif qui contient les données de chaque ligne du jeu de résultats. Le nom des indices correspond au nom des champs.

    echo $contenu['id_employes'] . '<br>';
    echo $contenu['prenom'] . '<br>';
    echo $contenu['nom'] . '<br>';
    echo $contenu['sexe'] . '<br>';
    echo $contenu['service'] . '<br>';
    echo $contenu['date_embauche'] . '<br>';
    echo $contenu['salaire'] . '<br>';
    echo '----------<br>';
}

// Quand vous faites une requête qui ne sort qu'un seul résultat : pas de boucle while, mais un fetch seul.
// Quand vous avez plusieurs résultats dans la requête : on fiat une boucle while pour parcourir les résultats.


// ----------------------------
echo '<h1>05. fetchAll </h1>';
// ----------------------------

$resultat = $pdo->query("SELECT * FROM employes");
$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);    // retourne toutes les lignes de résultats dans un tableau multidimensionnel sans faire de boucle : vous avez un array associatif à chaque tour de boucle. Marche asussi avec FETCH_NUM
echo '<pre>'; print_r($donnees); '</pre>';


// POur lire le contenu d'un array multidimensionnel nous faisons des boucles foreach imbriquées :
echo '<strong>Double boucle foreach</strong>';

foreach ($donnees as $contenu) { // $contenu est un sous-array associatif
    foreach ($contenu  as $indice => $valeur){ // on parcourt donc chaque sous array 
        echo $indice . ' correspond à ' . $valeur . '<br>';
    }
    echo '-------------<br>';
}

//************************************************
echo '<h1>06. Exercice </h1>';
//************************************************


// Afficher la liste des bases de données présentes sur votre SGBD dans une liste <ul><li></li></ul>.
// Pour mémoire, la requête SQL est SHOW DATABASES.


// FOREACH
$resultat = $pdo->query("SHOW DATABASES");
$donnees =$resultat->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>'; print_r($donnees); '</pre>';

// FOREACH
echo '<ul>';
    foreach ($donnees as $contenu) {
        
        foreach ($contenu  as $valeur){

            echo "<li>$valeur</li>";

        }

    
    }
 echo '</ul>';

// WHILE
$resultat = $pdo->query("SHOW DATABASES");
echo '<ul>';
    while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)){ 

        echo '<li>';
            echo $donnees['Database']; 
        echo'</li>';

    }
echo '</ul>';

//************************************************
echo '<h1>07. Table HTML</h1>';
//************************************************

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border = "1">';
    // Afichage de la ligne d'entête : 
    echo '<tr>';
        for($i = 0; $i <$resultat->columnCount(); $i++) {
            echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo'</pre>'; // pour voir ce que retourne la méthode getColumnMeta() : un array avec l'indice name qui contient le nom du champ

            $colonne = $resultat->getColumnMeta($i); // $colonne est un array qui contient l'indice name
            
            echo '<th>' . $colonne['name'] . '</th>';   // l'indice name contient le nom du champ
        }
    
    echo '</tr>';

    // Affichage des autres lignes :
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
            foreach($ligne as $information) {
    
                // echo'<pre>'; print_r($information); echo '</pre>';

                echo '<td>' . $information . '</td>';
            }

        echo '</tr>';
    }

echo '</table>';

//****************************************************************************
echo '<h1>08. Requête préparée : prepare() + bindParam() + execute() </h1>';
//****************************************************************************

$nom = 'Sennard';

// Préparation de la requête :
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom ");  // on prépare la requête sans l'exécuter avec un marqueur nominatif écrit :nom

// On donne une valeur au marqueur :nom
$resultat->bindParam(':nom', $nom, PDO::PARAM_STR);   // je lie le marqueur :nom à la variable $nom. Si on change le contneu de la variable, la valeur du marqueur changera automatiquement si on fait plusieurs execute

// On exécute la requête :
$resultat->execute();

$donnees =$resultat->fetch(PDO::FETCH_ASSOC);   // $donnees est un array associatif
echo implode($donnees, ' - ');  // implode transforme l'array en string

/*

    prepare() renvoie toujours un objet PDOStatement
    execute() renvoie :
        succès : un objet PDOStatement
        Echec : false

    Les requête préparée sont à préconiser si vous exécutez plusieurs fois la même requête (par exemple dans une boucle), et ainsi éviter le cycle complet analyse / interprétation / exécution de la requête.$_COOKIE

    Par ailleurs, les requêtes préparées sont souvent utilisées pour assainir les données en forçant le type des valeurs communiquées aux marqueurs.

*/

//****************************************************************************
echo '<h1>09. Requête préparée : prepare() + bindValue() + execute() </h1>';
//****************************************************************************

$nom = 'Thoyer';

// On prépare la requête :
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom ");

// On lie le marqueur à une valeur :
$resultat->bindValue(':nom', $nom, PDO::PARAM_STR);  //bindValue reçoit une variable ou un string. Le marqueur pointe uniquement vers la valeur : si celle-ci change, il faudra refaire un bindValue pour prendre en compte cette nouvelle valeur lors d'un prochain execute

// On exécute la requête :
$resultat->execute();

$donnees =$resultat->fetch(PDO::FETCH_ASSOC);   // $donnees est un array associatif
echo implode($donnees, ' - ');

echo '<br>';
// Si on change la valeur de la variable $nom, sans faire un nouveau bindValue, le marqueur de la requête pointe toujours vers 'Thoyer':

$nom = 'Durand';
$resultat->execute();
$donnees =$resultat->fetch(PDO::FETCH_ASSOC);  
echo implode($donnees, ' - ');  // en effet, on obtient toujours les informations de Thoyer et non pas de Durand.

//************************************************
echo '<h1>10. Exercice </h1>';
//************************************************

// 1- préparation :
// Après avoir importé la BDD "bibliothèque", affichez dans une liste <ul><li></li></ul> les livres empruntés par Chloé (il y en a plusieurs...), en utilisant une requête préparée.
$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


// 2- requête :
$resultat = $pdo->prepare("SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = :prenom))");

// INNER JOIN : ("SELECT l.titre FROM livre l INNER JOIN emprunt e ON e.id_livre = l.id_livre INNER JOIN abonne a ON a.id_abonne = e.id_livre WHERE a.prenom = :prenom");

$prenom = "Chloe";


$resultat->bindParam(':prenom', $prenom, PDO::PARAM_STR);   // on peut aussi avoir PDO::PARAM_INT ou PDO::PARAM_BOOL

$resultat->execute();   // on obtient un objet issu de la classe prédéfinie PDOStatement (= 1 résultat de requête)

// 3- le fetch :
echo '<ul>';
    while($livre = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<li>';
            echo $livre['titre'];
        echo '</li>';
    }

echo '</ul>';

//************************************************
echo '<h1>11. FETCH_CLASS</h1>';
//************************************************

// On se reconnecte à la BDD entreprise :
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

class Employes{
    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $service;
    public $date_embauche;
    public $salaire;    // on déclare autant de propriétés qu'il y a de champs dans la table employes. L'orthographe des propriétés doit être identique à celle des champs.

}

$result = $pdo->query("SELECT * FROM employes");
$donnees = $result->fetchAll(PDO::FETCH_CLASS, 'Employes');    // on obtient un array multidmensionnel indicé numériquement, qui contient à chaque indice un objet issu de la classe Employes

echo '<pre>'; print_r($donnees); echo '</pre>';
    
// On affiche le contenu de $donnees avec une boucle foreach :
foreach ($donnees as $employe) {
    echo $employe->prenom . '<br>';
}


//************************************************
echo '<h1>12. Points complémentaires</h1>';
//************************************************

// -----------
echo '<strong>Le marqueur "?"</strong><br>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ?");   // on prépare dans un premier temps la requête sans sa partie variable, que l'on représente avec des marqueurs sous forme de "?"

$resultat->execute(array('durand', 'damien'));  // "Durand" va remplacer le premier "?" et "Damien" le second

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);    // pas de boucle while car on sait qu'il n'y a qu'un seul résultat dans cette requête
echo implode($donnees, ' - ');  // notez que nous faisons un implode ici pour aller plus vite et éviter de faire l'affichage dans une boucle...


// -----------
echo '<br><strong>On peut faire un execute() sans bindParam()</strong><br>';

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom AND prenom = :prenom"); 
$resultat->execute(array('nom'=>'durand', 'prenom'=>'damien')); // notez que nous ne sommes pas obligés de mettre les ":" devant les marqueurs

$donnees = $resultat->fetch(PDO::FETCH_ASSOC); 
echo implode($donnees, ' - '); 

// -----------
echo '<br><strong>Afficher une erreur de requête SQL</strong><br>';
$resultat = $pdo->prepare("SELECT * FROM azerty WHERE nom = 'durand' ");
$resultat->execute();
echo '<pre>'; print_r($resultat->errorInfo()); echo '</pre>';   // errorInfo est une méthode qui appartient à la classe PDOStatement et qui fournit des infos sur l'erreur SQL éventuellement produite. On trouve le message de l'erreur à l'indice [2] de l'array retourné par cette méthode.


//************************************************
echo '<h1>12. Mysqli</h1>';
//************************************************

// Ilexiste une autre manière de se connecter à une BDD et d'effectuer des requêtes sur celle-ci : l'extension Mysqli.
// Connexion à la BDD :
$mysqli = new mysqli('localhost', 'root', '', 'entreprise');

// Un exemple de requête :
$requete = $mysqli->query("SELECT * FROM employes");

// Notez que les objets $mysqli (issu de la classe prédéfinie Mysqli) et $requete (issu de la classe Mysqli_result) ont des propriétées et des méthodes différentes de PDO. Nous ne poouvons donc pas mélanger les un avec les autres.

// **********************************************************************