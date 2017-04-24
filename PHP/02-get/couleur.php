<h1>Détails :</h1>

<?php

// Exercice :

/*
    - Dans le fichier listefruits créer trois liens: kiwi, banane et cerise. Quand on clique sur les liens, on passe le nom du fruit dans l'URL à la page couleur.php

    - Dans couleur.php : vous récupérez le nom du fruit et affichez sa couleur.

    Notez que vous ne passez pas la couleur dans l'URL mais vous la déduisez dans couleur.php.
*/

print_r($_GET);

if( isset($_GET ['fruit'] )){
    echo 'Fruit : ' . $_GET['fruit'] . '<br>';

    if($_GET ['fruit'] == 'banane'){
    echo 'Couleur: jaune <br>';
    
    }elseif($_GET ['fruit'] == 'kiwi'){
    echo 'Couleur : vert <br>';

    }elseif($_GET ['fruit'] == 'cerise'){
    echo 'Couleur : rouge <br>';

    }else{
    echo 'Aucun fruit sélectioné';
    }
}

